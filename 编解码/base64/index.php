<?php

$str = "This is an encoded string";
// 用 MIME base64 编码的数据
$str = base64_encode($str); // VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==
echo $str . PHP_EOL;

// base64_decode — 对使用 MIME base64 编码的数据进行解码
echo base64_decode($str) . PHP_EOL;

// 原样输出，包括空格
$str1 = <<<STRING
    This is an encoded
    This is an encoded
    This is an encoded
    This is an encoded
    This is an encoded
STRING;

$str1 = base64_encode($str1);

echo $str1 . PHP_EOL;
// 输出：
//     This is an encoded
//     This is an encoded
//     This is an encoded
//     This is an encoded
//     This is an encoded
echo base64_decode($str1, true) . PHP_EOL;
