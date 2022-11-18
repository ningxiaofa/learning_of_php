<?php

// 计算 0.58 * 100 [更加广泛一点：计算浮点数的数学运算]
// 解题思路:
// 将浮点数转换为整数「先放大」，进行运算，然后再变成浮点数『再缩小』

// 注意：通过将浮点数转化为字符串再转换为整形的方式，依然存在误差，所以，这种方式并不能保证，结果是准确的，建议还是使用
// bc 数学函数

// 原始数据
$invoice_amount = 0.58;
// var_dump($invoice_amount * 100); // float(57.99999999999999)
// $invoice_amount = 57.99999999999999; // 58
// $invoice_amount = 57.9999999999999; // 58
// $invoice_amount = 57.999999999999; // int(57999999999999)

$tmp = convertInt($invoice_amount);
// $tmp = convertInt2($invoice_amount);
// var_dump($tmp);
// exit;

// 进行数学运算
$op = 1 * 100;
$ret = $tmp * $op; // 这里比较巧的是，上面的变为整数的步骤，刚好就是要进行的数学运算

// 再还原为浮点数「缩小」
$ret /= 10 ** $count;

var_dump($ret);


function convertInt(float $f, $with = false)
{
    $str_f = (string)$f; // 原来也是有误差的[当浮点数已经到达精度上限}，所以，这种方式不可行的
    $tmp = intval(str_replace('.', '', $str_f));
    if (!$with) {
        return $tmp;
    }

    $index = stripos($str_f, '.');
    $length = strlen($str_f);
    $count = $length - $index - 1;
    return [$tmp, $count];
}

function convertInt2(float $f, $with = false)
{
    $str_f = (string)$f;

    $index = stripos($str_f, '.');
    $length = strlen($str_f);

    $tmp = 0;

    // 笨方法 -- 麻烦，但是又利用锻炼解决问题的能力
    for ($i = 0; $i < $length; $i++) {
        if ($i == $index) {
            continue;
        }
        $tmp += intval($str_f[$i]) * (10 ** ($length - $index - $i));
    }
    if (!$with) {
        return $tmp;
    }

    $count = $length - $index - 1;
    return [$tmp, $count];
}
