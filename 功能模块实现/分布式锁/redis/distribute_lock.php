<?php

// 「代码没经过实践检验，所以，生产中使用要谨慎」

/**
 * 实现Redis分布式锁
 */
$key    = 'demo';    //要更新信息的缓存KEY
$lockKey  = 'lock:' . $key; //设置锁KEY
$lockExpire = 10;      //设置锁的有效期为10秒

//获取缓存信息
$result = $redis->get($key);
//判断缓存中是否有数据
if (empty($result)) {
    $status = TRUE;
    while ($status) {
        //设置锁值为当前时间戳 + 有效期
        $lockValue = time() + $lockExpire;
        /**
         * 创建锁
         * 试图以$lockKey为key创建一个缓存,value值为当前时间戳
         * 由于setnx()函数只有在不存在当前key的缓存时才会创建成功
         * 所以，用此函数就可以判断当前执行的操作是否已经有其他进程在执行了
         * @var [type]
         */
        $lock = $redis->setnx($lockKey, $lockValue);
        /**
         * 满足两个条件中的一个即可进行操作
         * 1、上面一步创建锁成功;
         * 2、  1）判断锁的值（时间戳）是否小于当前时间  $redis->get()
         *      2）同时给锁设置新值成功  $redis->getset()
         */
        if (!empty($lock) || ($redis->get($lockKey) < time() && $redis->getSet($lockKey, $lockValue) < time())) {
            //给锁设置生存时间
            $redis->expire($lockKey, $lockExpire);
            //******************************
            //此处执行插入、更新缓存操作...
            //******************************

            //以上程序走完删除锁
            //检测锁是否过期，过期锁没必要删除
            if ($redis->ttl($lockKey)) {
                $redis->del($lockKey);
            }

            $status = FALSE;
        } else {
            /**
             * 如果存在有效锁这里做相应处理
             *   等待当前操作完成再执行此次请求
             *   直接返回
             */
            sleep(2); //等待2秒后再尝试执行操作
        }
    }
}
