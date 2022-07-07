<?php

$time = time();
var_dump($time); // int(1656917775)
$time = time() + 8 * 60 * 60; // 是因为差了八个时区，还是想设置16 p.m.为第二天 ? TBD
var_dump($time); // int(1656946597)

$currentDay = date("Y-m-d", $time);
var_dump($currentDay);

// string(10) "2022-07-04"