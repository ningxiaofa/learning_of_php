<?php

// 相关的函数
// str_ends_with() - Checks if a string ends with a given substring
// str_starts_with() - Checks if a string starts with a given substring
// stripos() - 查找字符串首次出现的位置（不区分大小写）
// strrpos() - 计算指定字符串在目标字符串中最后一次出现的位置
// strripos() - 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
// strstr() - 查找字符串的首次出现
// strpbrk() - 在字符串中查找一组字符的任何一个字符
// substr() - 返回字符串的子串
// preg_match() - 执行匹配正则表达式

// https://www.php.net/manual/zh/function.stripos.php
// https://www.php.net/manual/zh/function.strpos.php
// (PHP 5, PHP 7, PHP 8)

// stripos — 查找字符串首次出现的位置（不区分大小写）
// stripos(string $haystack, string $needle, int $offset = 0): int|false
// 返回在字符串 haystack 中 needle 首次出现的数字位置。

// 警告
// 此函数可能返回布尔值 false，但也可能返回等同于 false 的非布尔值。请阅读 布尔类型章节以获取更多信息。应使用 === 运算符来测试此函数的返回值。


$findme    = 'a';
$mystring1 = 'xyz';
$mystring2 = 'ABC';

$pos1 = stripos($mystring1, $findme);
$pos2 = stripos($mystring2, $findme);

// 'a' 当然不在 'xyz' 中
if ($pos1 === false) {
    echo "The string '$findme' was not found in the string '$mystring1'";
}

echo PHP_EOL;
// 注意这里使用的是 ===。简单的 == 不能像我们期望的那样工作，
// 因为 'a' 的位置是 0（第一个字符）。
if ($pos2 !== false) {
    echo "We found '$findme' in '$mystring2' at position $pos2";
}

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/stripos.php
// The string 'a' was not found in the string 'xyz'
// We found 'a' in 'ABC' at position 0 
// ➜  learning_of_php git:(master) ✗ 

// 注意: 此函数可安全用于二进制对象。

echo PHP_EOL;
// 不能用于多字节处理
$text = "我是宁小法"; //simple text
$spaceIsHere = stripos($text, "宁");
print $spaceIsHere . PHP_EOL;
$text2 = substr($text, $spaceIsHere); //cutting text with $spaceIsHere
print ($text2);

// 0-2,
// 3-5,
// 6 // UTF8编码下，一个中文，占用三个字节，这里因为刚好切分在第一个汉字的字节索引上，所以没有报错出现乱码
// 宁小法%

// 但是如果这里，将$spaceIsHere改为一个数字，并不是从中文编码的第一个字节开始，就会出现乱码
echo PHP_EOL;
$spaceIsHere = 4; // 4是第二个中文的第二个字节，并不是从第一个字节开始，所以，"我是"中的 是，会出现乱码，因为缺少第一个字节，导致解码失败，出现乱码
$text2 = substr($text, 4); //cutting text with $spaceIsHere
print ($text2);
// ��宁小法
