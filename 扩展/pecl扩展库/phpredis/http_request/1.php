<?php

// 引入 Redis 类文件
// require 'path/to/redis/autoload.php';

// 创建 Redis 连接对象并指定 persistent_id
$redis = new Redis();
$redis->pconnect('127.0.0.1', 6379, 0, 'persistent_id');

// 选择数据库
$redis->select($dbNumber);

// 保存 Redis 连接对象
// 你可以将连接对象存储在全局变量、会话（session）或缓存中，以便在后续请求中重用
$_SESSION['redis_connection'] = $redis;


