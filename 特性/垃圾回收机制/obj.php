<?php

// 测试对象的的变量赋值和引用赋值的区别
class Obj
{
    // TBD
}

class Obj1
{
    // TBD
}

$obj = new Obj();
$obj1 = $obj; // 变量赋值
// $obj1 = &$obj; // 引用赋值
var_dump($obj, $obj1);

$obj1 = new Obj1();
var_dump($obj, $obj1);

// Output:
// 变量赋值
// object(Obj)#1 (0) {
// }
// object(Obj)#1 (0) {
// }
// object(Obj)#1 (0) {
// }
// object(Obj1)#2 (0) {
// }

// 引用赋值
// object(Obj)#1 (0) {
// }
// object(Obj)#1 (0) {
// }
// object(Obj1)#2 (0) {
// }
// object(Obj1)#2 (0) {
// }

// 从上面运行的结果可以知道：
// 对象的变量赋值和引用赋值同PHP基本数据类型是一致的

// 但是，似乎对象的属性的赋值，使用变量赋值，也会是引用赋值 ? TBD