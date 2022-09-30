<?php

$a = 'a';
$b = 'b';

// 不借助第三个变量实现变量交换
list($a, $b) = [$b, $a];
var_dump($a, $b);
// string(1) "b"
// string(1) "a"