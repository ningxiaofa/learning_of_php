<?php

// https://www.php.net/manual/zh/features.commandline.php

// SAPI = Server Application Programming Interface
// CGI = Common Gateway Interface

// web运行方式 与 cli下运行方式
// 说实话，我现在还是不是很清楚这其中的区别，本质

// php_sapi_name
// (PHP 4 >= 4.0.1, PHP 5, PHP 7, PHP 8)

// php_sapi_name — 返回 web 服务器和 PHP 之间的接口类型

// 说明 ¶
// php_sapi_name(): string|false
// 返回描述 PHP 所使用的接口类型（the Server API, SAPI）的小写字符串。 
// 例如，CLI 的 PHP 下这个字符串会是 "cli"，
// Apache 下可能会有几个不同的值，取决于具体使用的 SAPI。 
// 以下列出了可能的值。-- 见返回值

// 返回值 ¶
// 返回接口类型的小写字符串， 或者在失败时返回 false。

// 尽管不够全面，可能返回的值包括了 apache、 apache2handler、 cgi （直到 PHP 5.3）, cgi-fcgi、cli、 cli-server、 embed、fpm-fcgi、 litespeed、 nsapi、phpdbg。

// 本机mac下执行：php -v
// ➜  learning_of_php git:(master) ✗ php -v 
// PHP 8.1.1 (cli) (built: Dec 17 2021 22:38:05) (NTS)
// Copyright (c) The PHP Group
// Zend Engine v4.1.1, Copyright (c) Zend Technologies
//     with Zend OPcache v8.1.1, Copyright (c), by Zend Technologies
// ➜  learning_of_php git:(master) ✗ 


// 关于php_sapi_name的验证
// 见另外的文件
// client.php -- 终端命令下执行
// index.php[php internal server]  -- 使用PHP内置服务器，然后输出
// 