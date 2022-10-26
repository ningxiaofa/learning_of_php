<?php

function zuhe2($arr, $begin)
{
    if ($begin == 0) {
        print_r($arr);
        echo "</br>";
    }

    if ($begin >= count($arr)) return;
    zuhe2($arr, $begin + 1); // begin时的排列上一次已产生，直接新增元素
    for ($i = $begin - 1; $i >= 0; $i--) {
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
        print_r($arr);
        echo "</br>";
        zuhe2($arr, $begin + 1);
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
    }
}

$arr = [1, 2, 3, 4];
$ret = zuhe2($arr, 0);
var_dump($ret);
