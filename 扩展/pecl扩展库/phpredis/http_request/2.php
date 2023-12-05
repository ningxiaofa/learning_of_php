<?php

// 引入 Redis 类文件
// require 'path/to/redis/autoload.php';

// 从之前的保存中获取 Redis 连接对象
session_start();
$redis = $_SESSION['redis_connection'];

// 检查连接是否断开
if ($redis->isConnected()) {
    echo "连接正常";
} else {
    echo "连接已断开";
}

?>