<?php

// 验证函数在PHP中是否具有一等公民的特征
// 如果一门编程语言对某种语言元素的创建和使用没有限制，我们可以像对待值（value）一样对待这种语法元素，那么我们就称这种语法元素是这门编程语言的“一等公民”。
// 拥有“一等公民”待遇的语法元素可以存储在变量中，===> 1
// 可以作为参数传递给函数，===> 2
// 可以在函数内部创建并可以作为返回值从函数返回 ===> 3

// Exec main
(function (){
    // 特征二 -- 支持
    run("varFunc");

    // 特征三 -- 支持 -- 但只是支持具名函数形式
    function subFunc(){
        echo "subFunc" . PHP_EOL;
        return "subFunc";
    }

    subFunc();
}
)();

// 特征一: 不支持【语言报错！】
// $func = function ($name){
//     echo $name;
// }

// 特征二 -- 支持
function run($func){
    $func();
}

function varFunc(){
    echo "varFunc" . PHP_EOL;;
    return "varFunc";
}







