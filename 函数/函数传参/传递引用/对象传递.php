<?php

class ExampleClass {
    public $property;
}

// function modifyObject(ExampleClass &$obj) {
//     $obj->property = "Modified";
// }

function modifyObject(ExampleClass $obj) { //同上效果, 默认就是传递引用
    $obj->property = "Modified";
}

$obj = new ExampleClass();
$obj->property = "Original";

echo $obj->property;  // 输出 "Original"

modifyObject($obj);

echo $obj->property;  // 输出 "Modified"

// ➜  learning_of_php git:(master) php 函数/函数传参/传递引用/对象传递.php
// OriginalModified                                    
// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/传递引用/对象传递.php
// OriginalModified
// 在 PHP 中，对象参数的传递方式是按引用传递的。即使您不使用 & 符号将对象参数声明为引用，在方法内对对象的修改仍然会反映在原始对象上。这是因为对象在 PHP 中默认以引用方式传递。