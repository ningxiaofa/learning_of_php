<?php

$arr = [
    1 => 1,
    '1' => '1', // 覆盖前者
];

var_dump($arr[1]);
var_dump($arr['1']);

//输出
// ➜  learning_of_php git:(master) ✗ php 数组函数/索引和关联数组/array.php
// /Users/mac/Documents/code/php/learning_of_php/数组函数/索引和关联数组/array.php:8:
// string(1) "1"
// /Users/mac/Documents/code/php/learning_of_php/数组函数/索引和关联数组/array.php:9:
// string(1) "1"
// ➜  learning_of_php git:(master) ✗ 