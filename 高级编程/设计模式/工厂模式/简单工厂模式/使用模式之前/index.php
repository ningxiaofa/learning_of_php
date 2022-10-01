<?php

// 用途：主要是负责用来创建[同样功能的]类的实例【对比思考跟单例模式的区别】
// 比如：项目需要一个缓存类【有些数据要放在缓存里面】
// 常用的缓存有： Memcached, Redis等。

// 参见 ./Memcached.php
require_once "Memcached.php";

// 然后我们要很多地方操作我们的缓存的时候, 就需要 new Memcached 这个类
$cache = new Memcached(); // 调用处1
$cache = new Memcached(); // 调用处2，调用处3 ....
// 但是正如上面所说, 会在很多地方调用, 就会散落在项目代码的很多地方, 有一天老板说, 诶, 这个Memcached感觉不够用了, 现在要换成Redis, 那这时候就糟糕了, 替换得翻多少代码去修改呢 [工作量可能不小, 而且还不能完全保证修改完毕, 一个不剩]

// 上面的代码要全部改成:
// Memcached 的类要改成 Redis， 而且调用的地方也要改成 Redis
require_once "Redis.php";
$cache = new Redis(); // 调用处1
$cache = new Redis(); // 调用处2， 调用处3 ....

// 有没有解决办法? ---------- 当放在某个层面解决不了的问题，放到更高的层面[编码中，通常是再往上抽象一层，生活中，则是提提高认知水平]，发现很容易解决 -- 这是重要的思考总结

// 有，使用工厂模式, 定义一个Cache类 .
// 个人看来】是为了更好的维护代码, 或者说可扩展性，减轻开发者的麻烦，有时候常常是减轻自己的麻烦 ----- 当学习了很多的设计模式之后，你会发现设计模式的本质用处都是为了使得代码易扩展，易维护，其他没什么作用.

// 见demo.php
