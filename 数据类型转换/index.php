<?php

// 1.
$ret = [
    'hello' => 'world'
];

var_dump(empty($ret['hello']));
var_dump(empty($ret['hello1']));

// 没定义
if (!empty($ret["group_id"] ?? '')){
    echo 'hello';
}

$ret = ['is_sig' => 2];

// 用于条件判断中
var_dump($ret['is_sig'] ?? false);
var_dump($ret['is_sig1'] ?? true);



