<?php

class test
{
    // code here
    public $name = 'name';
    public $Name = 'Name';
}

$test = new test();
$test1 = new Test();
var_dump($test, $test1);
// object(test)#1 (0) {
// }
// object(test)#2 (0) {
// }

// 当使用比较运算符（==）比较两个对象变量时，比较的原则是：如果两个对象的属性和属性值 （值使用 == 对比）都相等，而且两个对象是同一个类的实例，那么这两个对象变量相等。
// 而如果使用全等运算符（===），这两个对象变量一定要指向某个类的同一个实例（即同一个对象）。
var_dump($test == $test1);
// bool(true)