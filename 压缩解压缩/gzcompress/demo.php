<?php

// 需要进行压缩的字符串
$originalString = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

// 使用 gzcompress 函数进行压缩
$compressed = gzcompress($originalString);

// 输出压缩后的结果，类型为二进制字符串
echo $compressed . "\n";

// 使用 gzuncompress 函数进行解压缩
$uncompressed = gzuncompress($compressed);

// 输出解压缩后的结果，应该与原始字符串一致
echo $uncompressed . "\n";

// ➜  learning_of_php git:(master) ✗ php 压缩解压缩/gzcompress/demo.php
// x���    @�U��$�0�������<����0}{ Y�� ~R��^`L^��,�f�U�
// Lorem ipsum dolor sit amet, consectetur adipiscing elit.
// ➜  learning_of_php git:(master) ✗ 
