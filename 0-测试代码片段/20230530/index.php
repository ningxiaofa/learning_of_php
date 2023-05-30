<?php

$desc = '服务器错误：code=7 api=history/match json=result=TimedOut, error=No Exception network normal ,server response fail!!!';

$special_str = 'No Exception network normal ,server response fail!!!';
if (strpos($desc, $special_str) !== false) {
    echo "字符串存在，程序继续执行";
    exit;
}

// 如果程序执行到这里，说明字符串不存在
echo "字符串不存在，程序继续执行";
