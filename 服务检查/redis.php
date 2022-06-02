<?php

// 连接 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server successfully <br/>" . PHP_EOL; // PHP_EOL只是用于终端输出换行, <br/>用于浏览器换行

// 检测服务运行状态
if ($redis->ping()) {
      $color = 'green';
      $state = 'running';
} else {
      $color = 'red';
      $state = 'stop';
}
echo "Server state: <span style=\"color: {$color}\">{$state}</span> <br/>" . PHP_EOL;

// 设置 redis 字符串数据
$redis->set("words", "hello redis~");
// 获取存储的数据并输出
echo "Stored string in redis:: <span style='color: green;'>" . $redis->get("words") . '</span> <br/>' . PHP_EOL;

// 输出
// ➜  learning_of_php git:(master) ✗ /usr/local/opt/php@7.2/bin/php 服务检查/redis.php
// Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port) :-(
// Connection to server successfully <br/>
// Server state: <span style="color: green">running</span> <br/>
// Stored string in redis:: <span style='color: green;'>hello redis~</span> <br/>
// ➜  learning_of_php git:(master) ✗ 