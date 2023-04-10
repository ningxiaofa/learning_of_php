<?php

// 定义全局变量
$globalVar = 0;

function testStatic() {
    // 定义静态变量
    static $staticVar = 0;
    
    echo "Static variable value is: " . $staticVar . "<br>";
    echo PHP_EOL;
    $staticVar++;
}

function testGlobal() {
    global $globalVar;
    
    echo "Global variable value is: " . $globalVar . "<br>";
    echo PHP_EOL;
    $globalVar++;
}

testStatic(); // 输出 Static variable value is: 0
testStatic(); // 输出 Static variable value is: 1
testStatic(); // 输出 Static variable value is: 2
// echo $staticVar; //PHP Warning:  Undefined variable $staticVar

testGlobal(); // 输出 Global variable value is: 0
testGlobal(); // 输出 Global variable value is: 1
testGlobal(); // 输出 Global variable value is: 2
echo $globalVar; // 3

// 在上面的代码中，我们定义了两个函数 testStatic 和 testGlobal。testStatic 函数内定义了一个静态变量 $staticVar，用于统计函数被调用的次数，并且保留其值在函数调用之间。testGlobal 函数内使用 global 关键字声明了全局变量 $globalVar，可以在整个脚本中访问并修改它的值。

// 在调用 testStatic 函数时，每次输出的静态变量 $staticVar 的值都会增加 1，但在函数调用之间，其值会保留并传递给下一次函数调用。而在调用 testGlobal 函数时，每次输出的全局变量 $globalVar 的值也会增加 1，但是这个变量的作用域是整个脚本，因此可以在任何函数内部访问和修改它。