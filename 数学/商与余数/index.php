<?php

function divide($a, $b)
{
    $quotient = intdiv($a, $b); // 获取商
    $remainder = $a % $b; // 获取余数
    return array($quotient, $remainder);
}

// 示例用法
list($quotient, $remainder) = divide(10, 3);
// $ret = divide(494997241115843011, 4600000000005);
// var_dump($ret);
// echo "商：$quotient，余数：$remainder"; // 输出：商：3，余数：1
echo $quotient, $remainder;

