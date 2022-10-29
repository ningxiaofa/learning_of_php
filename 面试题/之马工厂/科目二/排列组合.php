<?php

function permute($arr, $begin)
{
    if ($begin == 0) {
        echo implode('', $arr) . ', ';
    }

    if ($begin >= count($arr)) return;
    permute($arr, $begin + 1); // begin时的排列上一次已产生，直接新增元素
    for ($i = $begin - 1; $i >= 0; $i--) {
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
        echo implode('', $arr) . ', ';
        permute($arr, $begin + 1);
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
    }
}

$arr = [1, 2, 3, 4];
// $arr = [1, 2, 3, 4, 5];
permute($arr, 0);


// 另外的解法：参加

// 输出结果:
// 1234
// 1243
// 1432
// 4231
// 1324
// 1342
// 1423
// 4321
// 3214
// 3241
// 3412
// 4213
// 2134
// 2143
// 2431
// 4132
// 2314
// 2341
// 2413
// 4312
// 3124
// 3142
// 3421
// 4123
