<?php

require_once "functions.php";

// 调用示例
$data = 'Hello, world!';
$key = 'my-secret-key';
$key = 'SHBTVXo1MftfmGEX2cjGv0FrY3I0s+hA';

// 加密数据
$encryptedData = opensslEncrypt($data, $key);
echo "加密后的数据：$encryptedData\n";

// 解密数据
$decryptedData = opensslDecrypt($encryptedData, $key);
echo "解密后的数据：$decryptedData\n";
