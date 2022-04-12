<?php

$keyword = "hello";
// $keyword = "你好";
$keyword = '*' . implode('*', str_split($keyword)) . '*'; // 不支持多字节字符，会产生乱码
var_dump($keyword);

$keyword = "你好";
$keyword = '*' . implode('*', mb_str_split($keyword)) . '*'; // 支持多字节字符
var_dump($keyword);

// ➜  learning_of_php git:(master) ✗ php 字符串/implode.php
// string(11) "*h*e*l*l*o*"
// string(9) "*你*好*"
// ➜  learning_of_php git:(master) ✗ 