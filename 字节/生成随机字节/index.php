<?php

// For Ref: https://www.php.net/manual/zh/function.random-bytes.php

// random_bytes(int $length): string
// $length: The length of the random string that should be returned in bytes. --- 即不是以 $length 为加密，而是约束返回的字符串以为字节为单位的长度.
// 注意这里bytes是字节, 而非bite，比特，即非0，1字符串
// 不过还是没有理解为什么会乱码显示？字节没有办法显示吗？
$bytes = random_bytes(5);
var_dump($bytes); // string(5) "��ޤf" "Pb�" 或者其他的随机字节

// bin2hex() - 函数把包含数据的二进制字符串转换为十六进制值
var_dump(bin2hex($bytes)); // string(10) "501d1f62c3"
