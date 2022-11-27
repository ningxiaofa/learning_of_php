<?php

// https://www.php.net/manual/zh/function.strstr.php
// (PHP 4, PHP 5, PHP 7, PHP 8)
// strstr — 查找字符串的首次出现
// strstr(string $haystack, string $needle, bool $before_needle = false): string|false
// 返回 haystack 字符串从 needle 第一次出现的位置开始到 haystack 结尾的字符串。

// 注意:
// 该函数区分大小写。如果想要不区分大小写，请使用 stristr()。
// 如果你仅仅想确定 needle 是否存在于 haystack 中，请使用速度更快、耗费内存更少的 strpos() 函数。

$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain; // 打印 @example.com

echo PHP_EOL;
$user = strstr($email, '@', true);
echo $user; // 打印 name

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/strstr.php
// @example.com
// name
// ➜  learning_of_php git:(master) ✗ 

