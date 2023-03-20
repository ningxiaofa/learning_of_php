<?php

$data = ["name" => "Tom", "age" => 18, "image" => file_get_contents("test.png")];

// exit( file_get_contents("test.png"));
// file_get_contents("test.png")的内容就是二机制字符串

// php encode_binary_string_1.php > file_get_contents_output.png // file_get_contents_output.png还是原来的图片格式，大小不变

// 使用 serialize() 函数将 PHP 数据结构序列化为文本字符串【二进制字符串将会被serialize函数编码处理，跟原来有变化】
$str = serialize($data);
// var_dump($str);

// 使用 base64_encode() 函数将序列化后的字符串编码为 base64 格式的字符串
$strEncoded = base64_encode($str);
// echo $strEncoded;

// 将字符串解码为原始的二进制数据
$dataDecoded = unserialize(base64_decode($strEncoded));

// 输出解码后的结果，可以看到原始的二进制数据已经恢复
echo $dataDecoded["image"];

// php encode_binary_string_1.php > decode_output.png // decode_output.png被还原