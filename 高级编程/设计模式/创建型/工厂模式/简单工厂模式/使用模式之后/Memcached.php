<?php

require_once "CacheInterface.php";

// 具体的实现类
class Memcached implements CacheInterface
{
    // 暂时使用数组来代替数据存储源
    public $data = [];

    public  function set($key, $value)
    {
        echo 'set...';
        // code here
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        echo 'get...';
        // code here   
        return $this->data[$key] ?? null;
    }

    public function delete($key)
    {
        echo 'delete...';
        // code here   
        unset($this->data[$key]);
    }
}
