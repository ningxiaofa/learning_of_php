<?php

//验证php脚本中,同一个请求生命周期内, 同一个类中的静态变量是否共享?
class Example {
    public static $counter = 0;
 
    public function __construct() {
       self::$counter++;
    }
 
    public static function getCounter() {
       return self::$counter;
    }
 }
 
 $obj1 = new Example();
 $obj2 = new Example();
 $obj3 = new Example();
 
 echo Example::getCounter(); // 输出 3，因为同一个请求生命周期内，对象共享了静态变量 $counter 的值

//  ➜  learning_of_php git:(master) ✗ php 面向对象/类/静态方法与静态属性.php
// 3                         
// ➜  learning_of_php git:(master) ✗ 