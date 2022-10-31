<?php

//初始数据
$array = array(
    1 => array(
        'name'  => '张三',
        'phone' => '13112345678',
        'sex'   => 1,   //男
        'email' => '123@163.com',
        'status'=> 2    //审核通过
    ),
    2 => array(
        'name'  => '李四',
        'phone' => '16812345678',
        'sex'   => 2,   //女
        'email' => '',
        'status'=> 3    //审核拒绝
    ),
    3 => array(
        'name'  => '王五',
        'phone' => '',
        'sex'   => 1,   //男
        'email' => '536@131.com',
        'status'=> 1    //待审核
    )
);

$array_sex = array(
    1 => '男',
    2 => '女'
);
$array_status = array(
    1 => '待审核',
    2 => '审核通过',
    3 => '审核拒绝'
);

include "./3_table_template.php";