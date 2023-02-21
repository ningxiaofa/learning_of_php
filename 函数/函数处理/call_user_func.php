<?php

// https://www.php.net/manual/zh/function.call-user-func

// call_user_func
// (PHP 4, PHP 5, PHP 7, PHP 8)
// call_user_func — 把第一个参数作为回调函数调用

function barber($type)
{
    echo "You wanted a $type haircut, no problem\n";
}
// 函数调用
call_user_func('barber', "mushroom");
call_user_func('barber', "shave");

echo PHP_EOL;

class myclass {
    // 静态方法
    static function say_hello()
    {
        echo "Hello!\n";
    }

    // 非静态方法
    public function say_world()
    {
        echo "World!\n";
        return 'World of return';
    }
}

$classname = "myclass";

//静态方法调用
call_user_func(array($classname, 'say_hello')); // fail
call_user_func($classname .'::say_hello'); // okay

//非静态方法调用 -------- 说明，只有静态方法才可以这么调用
// call_user_func(array($classname, 'say_world')); // fail
// call_user_func($classname .'::say_world'); // fail

// 
$myobject = new myclass(); // 如果是在class内部，可以使用self 或者 $this
$return = call_user_func(array($myobject, 'say_world'));
echo $return;


// 输出：
// ➜  learning_of_php git:(master) ✗ php 函数/函数处理/call_user_func.php
// You wanted a mushroom haircut, no problem
// You wanted a shave haircut, no problem

// Hello!
// Hello!
// World!
// World of return%                                                                                                                                                                      
// ➜  learning_of_php git:(master) ✗ 