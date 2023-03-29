<?php

function modify_array($str) { 
    // 在函数内部修改数组
    $str .= 'b';
    return $str;
}
  
// 创建一个初始数组
$str = 'a';

// 记录数组修改前的内存使用情况
$start_memory = memory_get_usage();

// 在函数内部修改数组
$new_str = modify_array($str); // Difference: 32 bytes
// $str .= 'b'; // Difference: 32 bytes
// $str .= 'bccdsfsdfdfsd';// Difference: 40 bytes
// $str .= 'bccdsfsdfdfsdsdf';// Difference: 48 bytes
// $str .= 'bccdsfsdfdfsdsdfsdsdfsdfsd';// Difference: 56 bytes

// 记录数组修改后的内存使用情况
$end_memory = memory_get_usage();

echo "Difference: " . ($end_memory - $start_memory) . " bytes";

// 基本知道 占用内存并不是呈线性增减
