<?php

$k = 10;

echo  $k--; // 10

echo '<br />';

echo $k; // 9

echo '<br />';

$k = 1;
if($m = $k--){ // 运算顺序: $m = $k; --> $k = $k-1; --> if($m) 
    echo $m; // 1
    echo '<br />';
    echo $k; // 0
}

$n = 10;
echo '<br />';
echo $q = --$n;  // 9 执行顺序: $n = $n --> $n = $n -1; --> $q = $n;
echo '<br />';
echo $q; // 9
echo '<br />';
echo $n; // 9

// 输出:
// 10
// 9
// 1
// 0
// 9
// 9
// 9