<?php

// 获取当前日期
$currentDate = date('Y-m-d');

// 获取起始日期
$startDate = '2023-01-01'; // 设置您希望的起始日期

// 计算起始日期的年份和周数
$startYear = date('Y', strtotime($startDate));
$startWeek = date('W', strtotime($startDate));

// 计算当前日期的年份和周数
$currentYear = date('Y', strtotime($currentDate));
$currentWeek = date('W', strtotime($currentDate));

var_dump($startYear, $startWeek, $currentYear, $currentWeek);

// 计算经过的周数
$weeksPassed = ($currentYear - $startYear) * 52 + ($currentWeek - $startWeek);
exit($currentWeek - $startWeek);
echo $currentYear - $startYear;
echo $weeksPassed . PHP_EOL;

// 判断当前是奇数周还是偶数周
$isEvenWeek = ($weeksPassed % 2 === 0);

// 根据奇偶性执行对应的事件
if ($isEvenWeek) {
    // 执行事件 B
    echo "本周执行事件 B";
} else {
    // 执行事件 A
    echo "本周执行事件 A";
}