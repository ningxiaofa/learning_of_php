<?php

$ret = [
    'normal' => 1,
    'junior' => 2,
    'middle' => 3,
    'senior' => 4,
];
$type = 1;
$key = array_search($type, $ret);
echo $key;