<?php
$patterns = array(
    '/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/',
    '/^\s*{(\w+)}\s*=/'
);
$replace = array('\3/\4/\1\2', '$\1 =');
echo preg_replace($patterns, $replace, '{startDate} = 1999-5-27');

echo PHP_EOL;

// 拆分程序
$patterns = '/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/';
$replace = '\3/\4/\1\2';
$ret = preg_replace($patterns, $replace, '{startDate} = 1999-5-27');
echo $ret . PHP_EOL;

$patterns = '/^\s*{(\w+)}\s*=/';
$replace = '$\1 =';
$ret = preg_replace($patterns, $replace, $ret);
echo $ret . PHP_EOL;

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串替换/preg_replace2.php
// $startDate = 5/27/1999
// {startDate} = 5/27/1999
// $startDate = 5/27/1999
// ➜  learning_of_php git:(master) ✗ 

