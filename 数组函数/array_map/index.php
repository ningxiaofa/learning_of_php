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
