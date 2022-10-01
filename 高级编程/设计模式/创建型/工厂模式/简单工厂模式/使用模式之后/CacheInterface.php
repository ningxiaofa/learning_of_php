<?php

// 定义接口
interface CacheInterface 
{
    public function set($key, $value);

    public function get($key);

    public function delete($key);
}