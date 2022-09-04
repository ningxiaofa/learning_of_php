<?php

// https://www.php.net/manual/zh/language.namespaces.php

// 命名空间的分隔符是反斜杠，该声明语句必须在文件第一行。
// 命名空间中可以包含任意代码，但只有 **类, 函数, 常量** 受命名空间影响。
namespace XXOO\Test;

// 该类的完整限定名是 \XXOO\Test\A , 其中第一个反斜杠表示全局命名空间。
class A{}

// 你还可以在已经文件中定义第二个命名空间，接下来的代码将都位于 \Other\Test2 .
namespace Other\Test2;

// 实例化来自其他命名空间的对象：
$a = new \XXOO\Test\A;
class B{}

// // 你还可以用花括号定义第三个命名空间 -- 下面的代码出现报错
// namespace Other {
//     // 实例化来自子命名空间的对象：
//     $b = new Test2\B;

//     // 导入来自其他命名空间的名称，并重命名，
//     // 注意只能导入类，不能用于函数和常量。
//     use \XXOO\Test\A as ClassA
// }
