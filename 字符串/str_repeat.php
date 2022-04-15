<?php

$keyword = '_hello-';
$ret = str_replace(array("_", "-"), ["\_", "\-"], $keyword);
$ret1 = str_replace("_", "\_", $keyword);
var_dump($ret);
var_dump($ret1);