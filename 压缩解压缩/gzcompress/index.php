<?php

$compressed = gzcompress('Compress me', 9);
echo $compressed; // 输出是 二进制流[二进制字符串] 直接打印【】会出现乱码，
// 防止乱码的方案：
// 将压缩的二进制字符串流，进行base64编码为正常的文本
// 反过来，先解码，后解压缩即可

// 这里是将json字符串进行压缩然后base64编码 -- 使用base64编码会导致压缩后的空间，变大33%，但是如果不处理，是没办法，在前后端交互的，展示的【TBD】
$compressed_base64_encoded = "eJxtUUFuwjAQ/MrKF0Ayke1ASHJrpd56qeCGUGKSBSwlcWQ7UFr177WDwqX1ZWdmZ7wr7TepdI0kJyuxZYJQ0qK18hyUk1SNF5xqPePJJknTDWeCklo6SfL9gRI0RhvrMdl+vG93L7u3/fjPIYdXaRGcPDYI2sBV4Q067eCkh67OgfNVAruxO7O6UU4qg4VD66Kv4igb2VVYCCZiJgSbQa3RdjMH+Kmsg7kfloPqLBrni9NQ/g2VMC/9olhSKAfvLFQdoLv3o9Siu+hRaXWH9wCqi+ptAEfdDfbZKjp9e7YnMlom0ksjW/5EYhzZh+F1Id2YNTixBVxlM6CF+bQpBc7CoyAYp+Drch2tHoBFCYUs9nzjKwvmLBNRGvuQ9/KQEfGSiaVgwLJ8neZC/CsuFsQfTOmi0efH8So74Z9fOjSafA==";

$ret = gzuncompress(base64_decode($compressed_base64_encoded));
exit($ret);

