<?php

use Redis;

// 连接 Redis 服务器
$redis = new Redis();
$redis->pconnect('127.0.0.1', 63790, 0, 'persistent_id');

// 选择数据库
$dbNumber = 0;
$redis->select($dbNumber);

// 设置键值对
$redis->set('key', 'value');

// 获取键的值
$value = $redis->get('key');
echo $value; // 输出: value

// 删除键
$redis->del('key');

// 关闭连接
$redis->close();
