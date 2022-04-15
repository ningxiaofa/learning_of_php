<?php

$keyword = "hello@.=";
$keyword = '*' . implode('*', str_split($keyword)) . '*'; // 不支持多字节字符，会产生乱码
var_dump($keyword);

$keyword = "你好";
$keyword = '*' . implode('*', mb_str_split($keyword)) . '*'; // 支持多字节字符
// 但是PHP最低版本为7.4
var_dump($keyword);


// 推荐做法
// https://stackoverflow.com/questions/2556289/php-split-multibyte-string-word-into-separate-characters
$keyword = "你好ya";
$chars = preg_split('//u', $keyword, -1, PREG_SPLIT_NO_EMPTY); // 支持多字节字符
$ret = '*' . implode('*', preg_split('//u', $keyword, -1, PREG_SPLIT_NO_EMPTY)) . '*';
var_dump($chars, $ret);


// string(17) "*h*e*l*l*o*@*.*=*"
// string(9) "*你*好*"
// array(4) {
//   [0]=>
//   string(3) "你"
//   [1]=>
//   string(3) "好"
//   [2]=>
//   string(1) "y"
//   [3]=>
//   string(1) "a"
// }
// string(13) "*你*好*y*a*"