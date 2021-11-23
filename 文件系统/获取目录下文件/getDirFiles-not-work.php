<?php

// 方式一：
// 列出指定目录下的目录和文件
// Note: 并没有获取目录的子目录下的文件和目录
function getDirFiles($dirPath){
    $files = [];

    if(!is_dir($dirPath)){
        throw new Exception('Directory is not exists!');
    }

    if($dh = openDir($dirPath)){
        while($file = readdir($dh) != false){
            if($file != '.' && $file != '..'){
                $files[] = $file;
            }
        }
        closeDir($dh);
    }
    var_dump($files);
    exit;

    return $files;
}

$testDir = './test/';
$files = getDirFiles($testDir);
var_dump($files);
