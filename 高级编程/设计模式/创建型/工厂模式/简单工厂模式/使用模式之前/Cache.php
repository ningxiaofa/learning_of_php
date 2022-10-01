<?php

class Cache
{
    public static function factory()
    {
        return new Memcached();

        // 如果由于项目变化, 要使用Redis, 则只需要改变这一个地方就可以了, 如下:
        // return new Redis(); // 使用Redis
    }
}