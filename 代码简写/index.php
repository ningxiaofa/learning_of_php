<?php

function testReturn($bool)
{
    // 简写1
    return $bool ? true : false;
}

$bool = 123;
$ret = testReturn($bool);
var_dump($ret);

$bool = [];
$ret = testReturn($bool);
var_dump($ret);

// bool(true)
// bool(false)
