<?php

namespace Test;

class Test{
    public function test()
    {
        return 'just for test';
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

// 输出：
// ➜  learning_of_php git:(master) ✗ php 函数/函数处理/命名空间调用.php
// just for test%                                                                                                                                                                        
// ➜  learning_of_php git:(master) ✗ 