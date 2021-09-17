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



