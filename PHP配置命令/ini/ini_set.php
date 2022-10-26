<?php

ini_set('error_reporting', 32767);
// 或者
// ini_set('error_reporting', E_ALL);
// $level = ini_get('error_reporting'); // string(5) "32767"

// error_reporting(E_ALL);
// $lev = error_reporting();
// var_dump($level); // string(5) "32767"
// var_dump($lev); // int(32767)

// 显示错误
var_dump(ini_get('display_errors')); // string(1) "1"

ini_set('display_errors','On');

var_dump(ini_get('display_errors')); // string(2) "On"

ini_set('display_errors','Off');
var_dump(ini_get('display_errors')); // string(3) "Off" 

// $ret = var_dump($undefined); // PHP Warning:  Undefined variable $undefined in /Users/huangbaoyin/Documents/Code/swoole/learning_of_swoole/ini_get.php on line 24
// NULL
// var_dump($ret); // NULL

ini_set('error_reporting', 0);
ini_set('display_errors','Off');
$ret = var_dump($undefined);  // NULL「无报错信息」

