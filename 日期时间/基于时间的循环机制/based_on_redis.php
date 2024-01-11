<?php


// 连接 Redis
$redis = new Redis([
    'scheme' => 'tcp',
    'host' => '127.0.0.1',
    'port' => 6379,
]);

// 设置当前周数和初始事件
$currentWeek = 1;
$initialEvent = '事件A';

// 将当前周数和初始事件添加到有序集合中
$redis->zadd('weekly_events', [$currentWeek => $initialEvent]);

// 获取当前周数对应的事件
$event = $redis->zrangebyscore('weekly_events', $currentWeek, $currentWeek)[0];

// 打印当前周数和事件
echo "当前周数：$currentWeek\n";
echo "当前事件：$event\n";
