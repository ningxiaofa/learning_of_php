<?php

// 具体的实现类
class Redis implements CacheInterface
{
    public  function set($key, $value)
    {
        // ...
        echo 'set...';
    }

    public function get($key)
    {
        // ...
        echo 'get...';
    }

    public function delete($key)
    {
        // ...
        echo 'delete...';
    }
}
