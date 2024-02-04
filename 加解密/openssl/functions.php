<?php

// 加密函数
function opensslEncrypt($data, $key, $cipher = 'AES-256-CBC')
{
    // 生成随机初始化向量
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    
    // 加密数据
    $encryptedData = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    // 将初始化向量和加密后的数据拼接在一起
    $encryptedDataWithIV = $iv . $encryptedData;
    
    // 返回加密后的数据
    return base64_encode($encryptedDataWithIV);
}

// 解密函数
function opensslDecrypt($encryptedData, $key, $cipher = 'AES-256-CBC')
{
    // 解码加密后的数据
    $encryptedDataWithIV = base64_decode($encryptedData);
    
    // 提取初始化向量和加密后的数据
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = substr($encryptedDataWithIV, 0, $ivLength);
    $encryptedData = substr($encryptedDataWithIV, $ivLength);
    
    // 解密数据
    $decryptedData = openssl_decrypt($encryptedData, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    
    // 返回解密后的数据
    return $decryptedData;
}