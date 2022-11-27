<?php

// https://www.php.net/manual/zh/function.preg-replace.php
// (PHP 4, PHP 5, PHP 7, PHP 8)
// preg_replace — 执行一个正则表达式的搜索和替换

// preg_replace(
//     string|array $pattern,
//     string|array $replacement,
//     string|array $subject,
//     int $limit = -1,
//     int &$count = null
// ): string|array|null

// 模式修饰符 ¶
// https://www.php.net/manual/zh/reference.pcre.pattern.modifiers.php

$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串替换/preg_replace.php
// April1,2003               
// ➜  learning_of_php git:(master) ✗ 

echo PHP_EOL;

$string = 'The quick brown fox jumps over the lazy dog.';
$patterns = array();
$patterns[0] = '/quick/';
$patterns[1] = '/brown/';
$patterns[2] = '/fox/';
$replacements = array();
$replacements[2] = 'bear';
$replacements[1] = 'black';
$replacements[0] = 'slow';
echo preg_replace($patterns, $replacements, $string);

// The bear black slow jumps over the lazy dog.
// 有点出乎意外，发现，不是自己想的那样，这样的情况，完全是语法设置的结果，不算什么有技术难度，只要在开发项目，测试认真点即可。

// 对模式和替换内容按 key 进行排序我们可以得到期望的结果。
ksort($patterns);
ksort($replacements);
echo preg_replace($patterns, $replacements, $string);
// The slow black bear jumps over the lazy dog.
