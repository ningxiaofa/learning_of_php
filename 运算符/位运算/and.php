<?php

// https://www.php.net/manual/zh/language.operators.bitwise.php
// 按位与 & ：全1为1，有0为0

$types = [
    1,
    2,
    7
];

foreach ($types as $type) {
    $ret = $type & 1;
    $ret1 = $type & 2;
    var_dump("$type : $ret", "$type : $ret1");
}

// Output:
// /Users/kumu/Documents/code/php-projects/learning_of_php/运算符/位运算/and.php:12:
// string(5) "1 : 1"
// string(5) "1 : 0"
// /Users/kumu/Documents/code/php-projects/learning_of_php/运算符/位运算/and.php:12:
// string(5) "2 : 0"
// string(5) "2 : 2"
// /Users/kumu/Documents/code/php-projects/learning_of_php/运算符/位运算/and.php:12:
// string(5) "7 : 1"
// string(5) "7 : 2"

// 由上可知
// When & 1， Will 1和7，结果为1
// When & 2， Will 2和7，结果为2

// 不推荐这种方式，维护方式，实在不好～