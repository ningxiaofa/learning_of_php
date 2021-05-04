<?php

// require_once("../迭代生成器/index.php");

function xrange($start, $end, $step = 1){
    for($i = $start; $i <= $end; $i += $step){
        yield $i;
    }
}


$range = xrange(1, 1000000);
var_dump($range); // object(Generator)#1
var_dump($range instanceof Iterator); // bool(true)
