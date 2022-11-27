<?php

// https://www.php.net/manual/zh/book.mbstring.php

// https://www.php.net/manual/zh/function.mb-stripos.php
// (PHP 5 >= 5.2.0, PHP 7, PHP 8)
// mb_stripos — 大小写不敏感地查找字符串在另一个字符串中首次出现的位置

// mb_stripos(
//     string $haystack,
//     string $needle,
//     int $offset = 0,
//     string $encoding = mb_internal_encoding()
// ): int

// mb_stripos() 返回 needle 在字符串 haystack 中首次出现位置的数值。 和 mb_strpos() 不同的是，mb_stripos() 是大小写不敏感的。 如果 needle 没找到，它将返回 false。

$text = "Look! It's a text! Wow!"; //simple text
$spaceIsHere = mb_stripos($text," "); //you can replace " " on something what you need or want
print $spaceIsHere . PHP_EOL;
$text2 = mb_substr($text, $spaceIsHere); //cutting text with $spaceIsHere
print ($text2);
// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/多字节匹配/mb_stripos.php
// 5
//  It's a text! Wow!
// ➜  learning_of_php git:(master) ✗ 

echo PHP_EOL;
$text = "我是宁小法"; //simple text
$spaceIsHere = mb_stripos($text, "宁");
print $spaceIsHere . PHP_EOL;
$text2 = mb_substr($text, $spaceIsHere); //cutting text with $spaceIsHere
print ($text2);
// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/多字节匹配/mb_stripos.php
// 2
// 宁小法
// ➜  learning_of_php git:(master) ✗ 