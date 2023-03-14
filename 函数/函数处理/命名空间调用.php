<?php

namespace Test;

class Test{
    public function test()
    {
        return 'just for test';
    }

    public function another_test($test = '')
    {
        return $test;
    }
}

$class = "Test\Test";
$method = 'test';

$class = new $class();

$ret = call_user_func([
    $class,
    $method,
]);

echo $ret;
echo "\n";
// 输出：
// ➜  learning_of_php git:(master) ✗ php 函数/函数处理/命名空间调用.php
// just for test%

$method = 'another_test';
$ret = call_user_func([
    $class,
    $method,
], 'another test');
echo $ret;
// ➜  learning_of_php git:(master) ✗ php 函数/函数处理/命名空间调用.php
// just for test
// another test%           
// ➜  learning_of_php git:(master) ✗ 