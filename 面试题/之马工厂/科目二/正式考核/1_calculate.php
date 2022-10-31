<?php

// 奖金计算函数
function reward($profit)
{
    $ret = 0;

    $firstPoint = 100000;
    $secondPoint = 200000;
    $thirdPoint = 400000;
    $fourthPoint = 600000;

    // 第一个等级判断
    $firstSection = $firstPoint - 0;
    $tmp = $profit - $firstSection;
    if ($tmp > 0) {
        $ret += $firstSection * 0.1;
    } else {
        return $profit * 0.1;
    }

    // 第二个等级判断
    $secnodSection = $secondPoint - $firstPoint;
    $tmp -= $secnodSection;
    if ($tmp > 0) {
        $ret += $secnodSection * 0.07;
    } else {
        return $ret += ($profit - $firstPoint) * 0.07;
    }

    // 第三个等级判断
    $thirdSection = $thirdPoint - $secondPoint;
    $tmp -= $thirdSection;
    if ($tmp > 0) {
        $ret += $thirdSection * 0.05;
    } else {
        return $ret + ($profit - $secondPoint) * 0.05;
    }

    // 第四个等级判断
    $fourthSection = $fourthPoint - $thirdPoint;
    $tmp -= $fourthSection;
    if ($tmp > 0) {
        $ret += $fourthSection * 0.03;
    } else {
        return $ret + ($profit - $thirdPoint) * 0.03;
    }

    // 最高等级判断
    return $ret += ($profit - $fourthPoint) * 0.01;
}

$myprofit = 708000;
echo '应发放奖金总数为：' . reward($myprofit) . '元'; //正确答案：34080

echo PHP_EOL;
if (reward($myprofit) == 34080) {
    exit("Yep, you are right");
}
exit('Nope, you are wrong');
