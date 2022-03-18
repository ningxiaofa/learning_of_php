<?php

// 验证函数在PHP中是否具有一等公民的特征
// 如果一门编程语言对某种语言元素的创建和使用没有限制，我们可以像对待值（value）一样对待这种语法元素，那么我们就称这种语法元素是这门编程语言的“一等公民”。
// 拥有“一等公民”待遇的语法元素可以存储在变量中，===> 1
// 可以作为参数传递给函数，===> 2
// 可以在函数内部创建并可以作为返回值从函数返回 ===> 3

// Exec main
// 特征1: 支持
$func = function ($name){
    echo $name . PHP_EOL;
};
$func("特征1 - 函数字面量");

(function (){
    // 特征2
    // 具名函数
    run("varFunc");
    // 匿名函数
    run(
        function (){
            echo "特征2 - 匿名函数" . PHP_EOL;
        }
    );

    // 特征三
    function subFunc(){
        echo "特征3 - 子函数调用" . PHP_EOL;
        return function (){
            echo "特征3 - 子函数返回值 - 函数调用" . PHP_EOL;
        };
    }

    $finalFunc = subFunc();
    // 返回值函数调用
    $finalFunc();
}
)();

// 特征二 -- 支持
function run($func){
    $func();
}

function varFunc(){
    echo "特征2 - 具名函数" . PHP_EOL;;
}

// 输出结果
// ➜  learning_of_php git:(master) ✗ php 函数/匿名函数/index2.php
// 特征1 - 函数字面量
// 特征2 - 具名函数
// 特征2 - 匿名函数
// 特征3 - 子函数调用
// 特征3 - 子函数返回值 - 函数调用

// 结论：PHP也是函数为一等公民