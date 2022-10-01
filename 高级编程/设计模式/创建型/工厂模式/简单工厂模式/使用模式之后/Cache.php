<?php

require_once "Memcached.php";
require_once "Redis.php";

// 抽象工厂类
class Cache
{
    public static function factory()
    {
        // 使用Memcached
        return new Memcached();

        // 如果由于项目变化, 要使用Redis, 则只需要改变这一个地方就可以了, 如下:
        // return new Redis(); // 使用Redis

        // 使用Redis
        // return  new Redis();
    }
}
