<?php

// 一定要弄清楚路径，看报错信息即可知道
// include_once(dirname(__DIR__) . "/依赖注入/Point.php");
include_once(dirname(__DIR__) . "/依赖注入/Circle.php");

// 或者
// 嵌套引入文件 -- 可以使用
// include_once(dirname(__DIR__) . "/依赖注入/DI.php");

// 执行脚本: php 高级编程/反射/test_reflection.php

// ReflectionClass
$reflectionClass = new reflectionClass(Circle::class);
// var_dump($reflectionClass);
// Return:
// object(ReflectionClass)#1 (1) {
//     ["name"]=>
//     string(6) "Circle"
// }

// 反射出类的常量
$consts = $reflectionClass->getConstants();
// var_dump($consts);
// Return:
// array(1) {
//     ["PI"]=>
//     float(3.14)
//   }


// 通过反射获取属性
$properties = $reflectionClass->getProperties();
// var_dump($properties);
// 返回一个由ReflectionProperty对象构成的数组
// Return:
// array(2) {
//     [0]=>
//     object(ReflectionProperty)#2 (2) {
//       ["name"]=>
//       string(6) "radius"
//       ["class"]=>
//       string(6) "Circle"
//     }
//     [1]=>
//     object(ReflectionProperty)#3 (2) {
//       ["name"]=>
//       string(6) "center"
//       ["class"]=>
//       string(6) "Circle"
//     }
//   }

// 反射出类中定义的方法
$methods = $reflectionClass->getMethods();
// var_dump($methods);
// Return:
// array(3) {
//     [0]=>
//     object(ReflectionMethod)#4 (2) {
//       ["name"]=>
//       string(11) "__construct"
//       ["class"]=>
//       string(6) "Circle"
//     }
//     [1]=>
//     object(ReflectionMethod)#5 (2) {
//       ["name"]=>
//       string(11) "printCenter"
//       ["class"]=>
//       string(6) "Circle"
//     }
//     [2]=>
//     object(ReflectionMethod)#6 (2) {
//       ["name"]=>
//       string(4) "area"
//       ["class"]=>
//       string(6) "Circle"
//     }
//   }

// 我们还可以通过getConstructor()来单独获取类的构造方法，其返回值为一个ReflectionMethod对象。
$constructor = $reflectionClass->getConstructor();
// var_dump($constructor);
// object(ReflectionMethod)#7 (2) {
//     ["name"]=>
//     string(11) "__construct"
//     ["class"]=>
//     string(6) "Circle"
//   }

// 反射出方法的参数
$parameters = $constructor->getParameters();
var_dump($parameters);
// 其返回值为ReflectionParameter对象构成的数组
// array(2) {
//     [0]=>
//     object(ReflectionParameter)#8 (1) {
//       ["name"]=>
//       string(5) "point"
//     }
//     [1]=>
//     object(ReflectionParameter)#9 (1) {
//       ["name"]=>
//       string(6) "radius"
//     }
//   }