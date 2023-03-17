<?php
// 获取命令行参数
$args = $argv;
// 输出参数列表
var_dump($args);

// php script.php arg1 arg2 arg3

// ➜  learning_of_php git:(master) ✗ php cli/命令行接收输入参数/script.php arg1 arg2 arg3
// /Users/mac/Documents/code/php/learning_of_php/cli/命令行接收输入参数/script.php:5:
// array(4) {
//   [0] =>
//   string(42) "cli/命令行接收输入参数/script.php"
//   [1] =>
//   string(4) "arg1"
//   [2] =>
//   string(4) "arg2"
//   [3] =>
//   string(4) "arg3"
// }
// ➜  learning_of_php git:(master) ✗ 