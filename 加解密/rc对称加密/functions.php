<?php

function rc4Encrypt($data, $key) {
    $s = array();
    for ($i = 0; $i < 256; $i++) {
        $s[$i] = $i;
    }

    $j = 0;
    $keyLength = strlen($key);
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % $keyLength])) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
    }

    $i = 0;
    $j = 0;
    $encryptedData = '';
    $dataLength = strlen($data);
    for ($k = 0; $k < $dataLength; $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
        $encryptedData .= $data[$k] ^ chr($s[($s[$i] + $s[$j]) % 256]);
    }

    return $encryptedData;
}

function rc4Decrypt($encryptedData, $key) {
    $s = array();
    for ($i = 0; $i < 256; $i++) {
        $s[$i] = $i;
    }

    $j = 0;
    $keyLength = strlen($key);
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % $keyLength])) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
    }

    $i = 0;
    $j = 0;
    $decryptedData = '';
    $encryptedDataLength = strlen($encryptedData);
    for ($k = 0; $k < $encryptedDataLength; $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
        $decryptedData .= $encryptedData[$k] ^ chr($s[($s[$i] + $s[$j]) % 256]);
    }

    return $decryptedData;
}

function detect_encoding($encryptedData)
{
    // 检测加密后的密文是否包含特殊字符或二进制数据
    if (mb_detect_encoding($encryptedData, 'ASCII', true) === false) {
        // 密文包含特殊字符或二进制数据
        // 需要进行适当的处理，例如使用 Base64 编码
        $encodedData = base64_encode($encryptedData);
        echo json_encode(["data" => $encodedData]);
    } else {
        // 密文只包含可打印的 ASCII 字符
        echo json_encode(["data" => $encryptedData]);
    }
}