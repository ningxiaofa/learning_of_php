<?php

// 获取二维数组某个字段的值，组成一维数组
$arr = [
    [
        'name' => 'william'
    ],
    [
        'name' => 'ning'
    ],
    [
        'name' => 'william ning'
    ],
];
// 1. 方式一
$ret = array_reduce($arr, function ($temp, $item) {
    $temp[] = $item['name'];
    return $temp;
}, []);
var_dump($ret);

// 2. 方式二
$ret = array_map(function ($item) {
    return $item['name'];
}, $arr);
var_dump($ret);

// 3. 方式三
$ret = array_column($arr, 'name');
var_dump($ret);

// 输出
// array(3) {
//     [0]=>
//     string(7) "william"
//     [1]=>
//     string(4) "ning"
//     [2]=>
//     string(12) "william ning"
//   }

//   array(3) {
//     [0]=>
//     string(7) "william"
//     [1]=>
//     string(4) "ning"
//     [2]=>
//     string(12) "william ning"
//   }

//   array(3) {
//     [0]=>
//     string(7) "william"
//     [1]=>
//     string(4) "ning"
//     [2]=>
//     string(12) "william ning"
//   }