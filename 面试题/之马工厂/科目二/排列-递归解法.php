<?php

// 题目：输出[1,2,3,4]的所有排列组合
// 结果：1234, 1243, 1432, 4231, 1324, 1342, 1423, 4321, 3214, 3241, 3412, 4213, 2134, 2143, 2431, 4132, 2314, 2341, 2413, 4312, 3124, 3142, 3421, 4123

// 经过分析，可以知道，可通过递归解决
// 思路: 递归代码的书写，关键点在于: 递归公式 和 终止条件

// 递归公式：「可以求总数」
// f(n) = n * f(n-1)
// 终止条件
// f(1) = 1
// f(2) = 2

function permuteCount($arr){
    $count = count($arr);
    if($count == 1){
        return 1;
    }
    if($count == 2){
        return 2;
    }
    unset($arr[$count-1]);
    return $count * permuteCount($arr);
}

// php 面试题/之马工厂/科目二/排列-递归解法.php
// echo permuteCount([1,2,3,4]) . PHP_EOL; // 24
// echo permuteCount([1,2,3,4,5,6]) . PHP_EOL; // 720

// 问题：如何将结果输出来呢「本质也是一样的」
// f(n) = arr[0到n-1] * f(n-1)
// arr[0到n-1]: 用到循环
// f(n-1): 根据原来数组选择的第一个元素而定，使用到新的数组，unset(原来的数组)

// 终止条件
// f(1) = arr[0]
// f(2) = arr[0].arr[1], arr[1].arr[0]

function permute($arr){
    // ReIndex
    $arr = array_values($arr);
    
    // Terminal condition
    $count = count($arr);
    if($count == 1){
        return $arr;
    }
    if($count == 2){
        return [$arr[0].$arr[1], $arr[1].$arr[0]];
    }

    // Receive result
    $ret = [];
    foreach ($arr as $key => $value) {
        // New parameter array
        $tmp = $arr;
        unset($tmp[$key]);
        foreach(permute($tmp) as $v){
            $ret[] = $value . $v;
        }
    }
    return $ret;
}

// print implode(', ', permute([1])); // 1
// print implode(', ', permute([1, 2])); // 12, 21
// print implode(', ', permute([1, 2, 3])); // 123, 132, 213, 231, 312, 321
// print implode(', ', permute([1, 2, 3, 4])); // 1234, 1243, 1324, 1342, 1423, 1432, 2134, 2143, 2314, 2341, 2413, 2431, 3124, 3142, 3214, 3241, 3412, 3421, 4123, 4132, 4213, 4231, 4312, 4321

print implode(', ', permute(['a', 'b', 'c', 'd'])); // abcd, abdc, acbd, acdb, adbc, adcb, bacd, badc, bcad, bcda, bdac, bdca, cabd, cadb, cbad, cbda, cdab, cdba, dabc, dacb, dbac, dbca, dcab, dcba

