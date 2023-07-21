<?php

$home_dir = $_SERVER['HOME'];
echo $home_dir;
// 或者
echo PHP_EOL;
$home_dir = getenv('HOME');
echo $home_dir;
exit;

// ➜  learning_of_php git:(master) ✗ php74 文件系统/获取家目录.php
// /Users/mac
// /Users/mac
// ➜  learning_of_php git:(master) ✗ 
