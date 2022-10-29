<?php
/*
 * 将各个项目及其成绩按表格形式输出
 */
$score  = array(
    1 => '极不满意',
    2 => '不满意',
    3 => '一般',
    4 => '满意',
    5 => '极满意'
);

$project    = array(
    '项目1' => 4,
    '项目2' => 5,
    '项目3' => 3,
    '项目4' => 2,
    '项目5' => 1
);

$ret = [];
foreach ($project as $key => $value){
    $ret[$key] = $score[$value];
}
var_dump($ret);
