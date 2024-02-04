<?php

require_once "functions.php";

$key = "your_key";  // 替换为您自己的密钥
$data = "data_to_encrypt";  // 要加密的数据
$encryptedData = rc4Encrypt($data, $key);
// echo json_encode(["data" => [123]]);
// echo json_encode(["data" => $encryptedData]);
detect_encoding($encryptedData);
echo $encryptedData;
