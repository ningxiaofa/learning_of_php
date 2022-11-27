<?php

// offset
// 通常，搜索从目标字符串的开始位置开始。可选参数 offset 用于 指定从目标字符串的某个位置开始搜索(单位是字节)。

// 注意:

// 使用offset参数不同于向preg_match() 传递按照位置通过substr($subject, $offset)截取目标字符串结果， 因为pattern可以包含断言比如^， $ 或者(?<=x)。 比较：
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);
// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/preg_match_with_offset.php
// Array
// (
// )
// ➜  learning_of_php git:(master) ✗ 

// 当这个示例使用截取后传递时
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
print_r($matches);

// Array
// (
//     [0] => Array
//         (
//             [0] => def
//             [1] => 0
//         )
// )

// 要避免使用 substr()，可以用 \G 断言而不是 ^ 锚，或者 A 修改器，它们都能和 offset 参数一起运行。
$subject = "abcdef";
$pattern = '/\Gdef/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);

// Array
// (
//     [0] => Array
//         (
//             [0] => def
//             [1] => 3
//         )
// )

$subject = "abcdef";
$pattern = '/def/A';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);
// Array
// (
//     [0] => Array
//         (
//             [0] => def
//             [1] => 3
//         )
// )


// 返回值 ¶
// 如果 pattern 匹配到指定 subject，则 preg_match() 返回 1，如果没有匹配到则返回 0， 或者在失败时返回 false。
// 警告
// 此函数可能返回布尔值 false，但也可能返回等同于 false 的非布尔值。请阅读 布尔类型章节以获取更多信息。应使用 === 运算符来测试此函数的返回值。