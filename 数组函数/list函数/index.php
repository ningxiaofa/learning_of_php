<?php

function testListFunc()
{
    return ['hello', 'world'];
}

list($first, $last) = testListFunc();
var_dump($first, $last);
var_dump($first);
var_dump($first, $last, $undefinded); /// 会出现Warning，但是依然会返回NULL

// string(5) "hello"
// string(5) "world"
// string(5) "hello"

// PHP Warning:  Undefined variable $undefinded in /Users/kumu/Documents/code/learning_of_php/数组函数/list函数/index.php on line 11

// Warning: Undefined variable $undefinded in /Users/kumu/Documents/code/learning_of_php/数组函数/list函数/index.php on line 11
// string(5) "hello"
// string(5) "world"
// NULL