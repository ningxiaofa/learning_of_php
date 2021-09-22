<?php

// mock data
$data = [
    [
        'fid' => 1,
    ],
    [
        'fid' => 2,
    ],
    [
        'fid' => 3,
    ]
];

$ret = array_reduce($data, function ($acc, $item) {
    // var_dump($acc);
    // exit;
    $acc[] = $item['fid'];
    return $acc;
}, []);

var_export($ret);
// predict output: should be like this following
// [
//     'fid' => 1,
//     2,
//     3,
// ]

// real output:
// array (
//     0 => 1,
//     1 => 2,
//     2 => 3,
// )

// Reason:
// init value is empty array

// 实现香相同效果的函数
// 方式一： 循环处理 -- 个人更加推荐 -- 易读
$ret = [];
foreach($data as $value){
    var_dump($value);
    exit;
    $ret[] = $value['fid'];
}
var_export($ret);

// 方式二： array_map -- 针对上面的实现要求，个人更加推荐
echo "参考：数组函数/array_map/index.php";
$ret = array_map(function($value){
    return $value['fid'];
}, $data);
var_export($ret);
