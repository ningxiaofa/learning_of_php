<?php


$ret = [
    'hello',
    'world',
    'william'
];

// 常常用作函数或者方法的回调函数
// 当只使用一次时，推荐使用，这样简洁，而且用完即可，不用命名，也就不用关注名字，只要看功能即可，使用完就释放
$newRet = array_map(function($ele){
    return $ele . '...';
}, $ret);
var_dump($newRet);
// 输出
// array(3) {
//     [0]=>
//     string(8) "hello..."
//     [1]=>
//     string(8) "world..."
//     [2]=>
//     string(10) "william..."
//   }

// 相当于
$closure = function ($name){
    return $name . '...';
};
$newRet1 = array_map($closure, $ret);
var_dump($newRet1);
// array(3) {
//     [0]=>
//     string(8) "hello..."
//     [1]=>
//     string(8) "world..."
//     [2]=>
//     string(10) "william..."
//   }

// 当然也可以使用具名函数
function closure($name){
    return $name . '...';
};

$newRet2 = array_map('closure', $ret);
var_dump($newRet2);
// array(3) {
//     [0]=>
//     string(8) "hello..."
//     [1]=>
//     string(8) "world..."
//     [2]=>
//     string(10) "william..."
//   }
