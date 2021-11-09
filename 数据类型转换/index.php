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


// 踩了坑
$role = "160";
// $role = "100";
$shouldRoles = [
    160,
    170
];

if(in_array($role, $shouldRoles)){
    echo 'yes, i am here';
}else{
    echo 'no, i am not heer';
}
// 输出：
// yes, i am here



// ...大抵知道
// PHP的类型转换，存在隐式类型转换，多数情况下[most of functions of php self]，都会使用隐式类型转换.
// 但是还是要去确认一下比较好

