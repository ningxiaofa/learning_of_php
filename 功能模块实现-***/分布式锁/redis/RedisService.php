<?php

//代码供参考，项目中的代码

namespace App\Services\Base;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use mysql_xdevapi\Exception;

class RedisService
{
    static protected $prefix = "__pf__";
    static protected $suffix = "__sf__";

    static protected $local_cache = [];
    static protected $center_cache = [];

    static public function center()
    {
        return Redis::connection("center");
    }

    static public function local()
    {
        return Redis::connection("cache");
    }

    static public function match()
    {
        return Redis::connection("match");
    }
    /**
     * @param $name
     * @param $keys
     * @return string
     */
    static protected function makeKey($name,$keys)
    {
        if (is_array($keys)) {
            $key = implode(",", $keys);
        } else {
            $key = $keys;
        }
        if(strlen($key) > 30){
            $key = self::$prefix.$name.self::$suffix.sha1($key);
        }else{
            $key = self::$prefix.$name.self::$suffix.$key;
        }
        return $key;
    }

    /**keys 为数组或者字符串
     * @param $name
     * @param string | array $keys
     * @param $callback
     * @param int $expire
     * @return mixed
     */
    static public function cacheObject($name,$keys,$callback,$expire = 300)
    {
        $key = self::makeKey($name,$keys);
        if(isset(self::$local_cache[$key]))
        {
            return self::$local_cache[$key];
        }
        $string = self::local()->get($key);
        if(is_null($string))
        {
            $data = $callback();
            self::local()->setex($key,$expire,serialize(["data" => $data]));
            self::$local_cache[$key] = $data;
            return $data;
        }
        else
        {
            $pack = unserialize($string);
            $data = $pack['data'];
            self::$local_cache[$key] = $data;
            return $data;
        }
    }

    static public function rootCacheObject($name,$keys,$callback,$expire = 300)
    {
        $key = self::makeKey($name,$keys);
        if(isset(self::$center_cache[$key]))
        {
            return self::$center_cache[$key];
        }
        $string = self::center()->get($key);
        if(is_null($string))
        {
            $data = $callback();
            self::center()->setex($key,$expire,serialize(["data" => $data]));
            self::$center_cache[$key] = $data;
            return $data;
        }
        else
        {
            $pack = unserialize($string);
            $data = $pack['data'];
            self::$center_cache[$key] = $data;
            return $data;
        }
    }

    /**
     * 当有效时间小于总时间的一半，就会自动续期
     * @param $name
     * @param $keys
     * @param $callback
     * @param int $expire
     * @return mixed
     */
    static public function rootCacheObjectAutoReNew($name,$keys,$callback,$expire = 57600)
    {
        $key = self::makeKey($name,$keys);
        $string = self::center()->get($key);
        if(is_null($string))
        {
            $data = $callback();
            $expire_time = time() + $expire;
            self::center()->setex($key,$expire,serialize(["data" => $data,"expire_time" => $expire_time]));
            return $data;
        }
        else
        {
            $pack = unserialize($string);
            $expire_time = Arr::get($pack,'expire_time',0);
            $data = $pack['data'];
            if($expire_time < time() + $expire / 2)
            {
                $expire_time = time() + $expire;
                self::center()->setex($key,$expire,serialize(["data" => $data,"expire_time" => $expire_time]));
            }
            return $data;
        }
    }

    /**删除
     * @param $name
     * @param $keys
     */
    static public function deleteCacheObject($name,$keys)
    {
        $key = self::makeKey($name,$keys);
        unset(self::$local_cache[$key]);
        self::local()->del($key);
    }

    static public function rootDeleteCacheObject($name,$keys)
    {
        $key = self::makeKey($name,$keys);
        unset(self::$center_cache[$key]);
        self::center()->del($key);
    }

    /**
     * 很长时间没有加锁成功，就有问题
     * @param $key
     */
    static protected function lock($key)
    {
        for($i = 0;$i < 500;$i ++)
        {
//            if(self::center()->set($key, time() + 300, ['NX','EX' => 300]))
            if(self::center()->set($key, time() + 35, 'NX','EX',35))
            {
                break;
            }
            else
            {
                sleep(1);
            }

            if($i == 35)
            {
                self::center()->expire($key,1);
                LogService::error("lock error $key");
                break;
            }
        }
    }

    static protected function unlock($key)
    {
        self::center()->del($key);
    }

    static public function lockFunction($name,$keys,$function)
    {
        $key = self::makeKey($name,$keys);
        self::lock($key);
        try
        {
            $data = $function();
        }
        catch (\Exception $e)
        {
            self::unlock($key);
            throw $e;
        }
        self::unlock($key);
        return $data;
    }


    /**
     * 单点redis进程锁
     * @param $name
     * @param $keys
     * @param $function
     * @param $ret_data
     * @return bool
     * @throws \Exception
     */
    static public function lockFunctionOrFail($name,$keys,$function,&$ret_data)
    {
        $key = self::makeKey($name,$keys);
        $ret_lock = self::lockOrFail($key);          //返回值要么是true，要么是false
        if($ret_lock)
        {
            //可以进行函数操作
            try
            {
                $ret_data = $function();
            }
            catch (\Exception $e)
            {
                self::unlock($key);
                throw $e;
            }
        }
        else
        {
            //这里直接不能进行操作，直接返回false
            return $ret_lock;
        }
        self::unlock($key);     //因为是单机版redis锁定
        return $ret_lock;
    }


    /**
     * 加锁失败直接返回
     * @param $key
     * @return bool
     */
    static public function lockOrFail($key)
    {
        //加锁失败，直接返回false，表示该锁依旧存在，不能进行操作
        if(self::center()->set($key, time() + 300, 'NX','EX',300))
        {
            return true;
        }
        return false;
    }

    /**
     * 循环调用使用
     * @param $name
     * @param $function
     * @param $init_data
     * @return bool
     * @throws \Exception
     */
    static public function loop($name,$function,$init_data)
    {
        $key = self::makeKey($name,[]);
        $lock_key = self::makeKey($key,"lock");
        $ret_lock = self::lockOrFail($lock_key);
        if($ret_lock)
        {
            try{
                if(self::center()->exists($key))
                {
                    $init_data = unserialize(self::center()->get($key));
                }
                $init_data = $function($init_data);
                self::center()->setex($key,86400,serialize($init_data));
            }
            catch (\Exception $exception)
            {
                self::unlock($lock_key);
                throw $exception;
            }
        }
        else
        {
            return $ret_lock;
        }
        self::unlock($lock_key);
    }

    static public function deleteCacheName($name,$cnf = 'local')
    {
        if(empty($name)) {
            return true;
        }
        $key = self::makeKey($name,'*');
        $redis = self::local();
        if($cnf == 'center') {
            $redis = self::center();
        }
        $r = $redis->keys($key);
        if(!empty($r)) {
            foreach ($r as $v){
                $redis->del($v);
            }
        }
        return true;
    }
}
