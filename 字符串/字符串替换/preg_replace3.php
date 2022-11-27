<?php
// 这个例子剥离多余的空白字符
$str = 'foo   o';
$str = preg_replace('/\s\s+/', ' ', $str); // \s\s+ 匹配两个空格及以上
// 将会改变为'foo o'
echo $str . PHP_EOL;

$count = 0;

echo preg_replace(array('/\d/', '/\s/'), '*', 'xp 4 to', -1 , $count);
echo $count; //3

echo PHP_EOL;
$p = array('/a/', '/b/', '/c/');
$r = array('b', 'c', 'd');
print_r(preg_replace($p, $r, 'a'));
// 打印 d
// 原因就在于逐一匹配替换，上一次的匹配替换的结果输出作为下一次的匹配替换的的输入
