<?php

$a = null;
$ret = $a ?? false;
// if(isset($a)){
//     $ret = $a;
// }else{
//     $ret = false;
// }
var_dump($ret);

$a = 0;
$ret = $a ?? false;
var_dump($ret);

$ret = $a ?: false;
var_dump($ret);
