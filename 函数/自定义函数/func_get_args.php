<?php

// https://www.php.net/manual/zh/function.func-get-args.php
// (PHP 4, PHP 5, PHP 7, PHP 8)
// func_get_args — 返回一个包含函数参数列表的数组

// 该函数可以配合 func_get_arg() 和 func_num_args() 一起使用，从而使得用户自定义函数可以接受自定义个数的参数列表。 

function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs \n";
    if ($numargs >= 2) {
        echo "Second argument is: " . func_get_arg(1) . "\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "Argument $i is: " . $arg_list[$i] . "\n";
    }
}

// foo(1, 2, 3);
// 输出:
// ➜  learning_of_php git:(master) ✗ php 函数/自定义函数/func_get_args.php
// Number of arguments: 3 
// Second argument is: 2
// Argument 0 is: 1
// Argument 1 is: 2
// Argument 2 is: 3
// ➜  learning_of_php git:(master) ✗ 

function test(){
    $arg_list = func_get_args();
    if($arg_list[0] ?? false){
        $func = $arg_list[0];
        unset($arg_list[0]);
        $func(array_values($arg_list));
    }
}

function my_func($a){
    var_dump($a);
    $arg_list = func_get_args();
    var_dump($arg_list); 
}

test('my_func', 1, 2, 3);

// 输出:
// ➜  learning_of_php git:(master) ✗ php 函数/自定义函数/func_get_args.php
// /Users/mac/Documents/code/php/learning_of_php/函数/自定义函数/func_get_args.php:42:
// array(3) {
//   [0] =>
//   int(1)
//   [1] =>
//   int(2)
//   [2] =>
//   int(3)
// }
// /Users/mac/Documents/code/php/learning_of_php/函数/自定义函数/func_get_args.php:44:
// array(1) {
//   [0] =>
//   array(3) {
//     [0] =>
//     int(1)
//     [1] =>
//     int(2)
//     [2] =>
//     int(3)
//   }
// }
// ➜  learning_of_php git:(master) ✗ 