<?php

// $v1: current value
// $v2: next value
function myfunction($v1, $v2)
{
    // var_dump($v1, $v2);
    // output:
    // string(5) "hello"
    // string(3) "Dog"
    // string(9) "hello-Dog"
    // string(3) "Cat"
    // string(13) "hello-Dog-Cat"
    // string(5) "Horse"
    return $v1 . "-" . $v2;
}

$a = [
    "Dog", "Cat", "Horse"
];
// $a: array, input
// myfunction: string, callback func
// hello: string, init value of callback function
// 简单说，就是迭代处理数组元素的值，至于具体的操作则是自定义回到函数的事情了，你可以拼接字符串，加减乘除，或者其他乱七八糟的操作
print_r(array_reduce($a, "myfunction", 'hello'));
// output:
// hello-Dog-Cat-Horse
