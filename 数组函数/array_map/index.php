<?php

// Document: https://www.php.net/manual/zh/function.array-map.php
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

$ret = array_map(function($value){
    return $value['fid'];
}, $data);
var_export($ret);

// If empty array
$members = [
    [
        'uid' => 'justtest'
    ]
];
$members = []; // 并不会报错 输出： 空数组
$guid_list = array_map(function($member){
    return $member['uid'];
}, $members);
var_dump($guid_list);
