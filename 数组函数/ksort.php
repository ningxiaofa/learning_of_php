<?php

$age = [
    "Bill" => "60", 
    "Steve" => "56", 
    "mark" => "31",
    1 => 1,
    2 => 1,
    0 => 1,
    100 => 1
];
$ret = ksort($age);
var_dump($ret, $age);
$ret = array_values($age);
var_dump($age);

// Output
// ➜  learning_of_php git:(master) ✗ php 数组函数/ksort.php
// /Users/kumu/Documents/code/php-projects/learning_of_php/数组函数/ksort.php:5:
// bool(true)
// /Users/kumu/Documents/code/php-projects/learning_of_php/数组函数/ksort.php:5:
// array(7) {
//     'Bill' =>
//     string(2) "60"
//     'Steve' =>
//     string(2) "56"
//     'mark' =>
//     string(2) "31"
//     [0] =>
//     int(1)
//     [1] =>
//     int(1)
//     [2] =>
//     int(1)
//     [100] =>
//     int(1)
//   }
// ➜  learning_of_php git:(master) ✗ 
// /Users/kumu/Documents/code/php-projects/learning_of_php/数组函数/ksort.php:15:
// array(7) {
//   'Bill' =>
//   string(2) "60"
//   'Steve' =>
//   string(2) "56"
//   'mark' =>
//   string(2) "31"
//   [0] =>
//   int(1)
//   [1] =>
//   int(1)
//   [2] =>
//   int(1)
//   [100] =>
//   int(1)
// }