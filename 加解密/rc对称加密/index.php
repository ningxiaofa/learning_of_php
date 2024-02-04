<?php

require_once "functions.php";

$key = "your_key";  // 替换为您自己的密钥
$data = "data_to_encrypt";  // 要加密的数据
$encryptedData = rc4Encrypt($data, $key);
echo "Encrypted data(加密后密文): {$encryptedData}" . PHP_EOL;
echo "Encrypted data(密文转base编码): " . base64_encode($encryptedData);
echo PHP_EOL;

$decryptedData = rc4Decrypt($encryptedData, $key);
echo "Encrypted data(解密后明文): {$decryptedData}" . PHP_EOL;
echo "Encrypted data(明文转base编码, 起始已经不需要(不会出现乱码,不可打印字符)): " . base64_encode($decryptedData);
echo PHP_EOL;
