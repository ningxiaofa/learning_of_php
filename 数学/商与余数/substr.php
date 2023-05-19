<?php

function subStrToInt($int){
    return intval(substr((string)($int), 0, 8));
}

$arr = ['int' => 494997241115843011];

subStrToInt($arr['int']);
var_dump($arr);