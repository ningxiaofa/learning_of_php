<?php

// use Redis; // The use statement with non-compound name 'Redis' has no effect in

// 创建 Redis 连接对象并指定 persistent_id
$redis = new Redis();
$redis->pconnect('127.0.0.1', 63790, 0, 'persistent_id'); // persistent_id 自己定义一个更加好用

// 选择数据库
$dbNumber = 0;
$redis->select($dbNumber);

// 输出连接的唯一 ID
echo "Persistent ID: " . $redis->getPersistentID() . "\n";

// 执行一些操作...
$redis->set('key', 'value');
$value = $redis->get('key');
echo "Value: " . $value . "\n";

// 使用 Redis 监控命令验证连接有效性和状态
$result = $redis->rawCommand('CLIENT', 'LIST');
echo "Client List:\n" . $result . "\n";


// 重复调用 $redis = new Redis();
// $redis->pconnect('127.0.0.1', 6379, 0, 'persistent_id'); 是否会创建多个长连接?

// Assistant
// Poe
// 在每次调用 $redis = new Redis(); 和 $redis->pconnect('127.0.0.1', 6379, 0, 'persistent_id'); 时，phpredis 库会尝试重用具有相同 persistent_id 的现有长连接。这意味着如果之前已经使用相同的 persistent_id 建立了长连接，那么在后续的调用中将不会创建新的连接，而是重用现有的连接。

// 所以，重复调用 $redis = new Redis(); 和 $redis->pconnect('127.0.0.1', 6379, 0, 'persistent_id'); 不会创建多个长连接，而是重用之前已经建立的长连接。

// persistent_id 是用于标识和区分不同长连接的唯一标识符。通过使用相同的 persistent_id，可以确保在多次请求中重用相同的长连接，而不会创建多个连接。

// 因此，你可以放心地在每次请求中调用 $redis = new Redis(); 和 $redis->pconnect('127.0.0.1', 6379, 0, 'persistent_id');，phpredis 库会自动重用之前的长连接，而不会创建多个连接。