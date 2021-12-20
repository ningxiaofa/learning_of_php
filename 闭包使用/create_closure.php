<?php

// 1. 最简单的闭包创建
$closure = function ($name){
    return 'hello, world ' . $name;
};

// // createClosure
echo $closure('william');
// 输出
// hello, world william

// 仅仅是补充
function closure($name){
    return 'hello, ' . $name;
}
echo closure('william');
// 输出
// hello, william