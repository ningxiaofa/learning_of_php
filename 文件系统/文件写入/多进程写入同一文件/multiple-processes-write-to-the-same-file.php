<?php

function writeFile($filePath, $content)
{
    // 以追加的方式打开文件，返回的是指针
    $handle = fopen($filePath, 'a+');
    if (!$handle) return;

    do {
        // 暂停执行程序，参数是以微秒为单位的
        usleep(100);
    } while (!flock($handle, LOCK_EX)); // 以独享写入方式锁定文件，成功返回TRUE，否则FALSE
    // 以追加的方式写入数据到打开的文件
    fwrite($handle, $content . "\r\n");
    // 解锁，以让别的进程进行锁定
    flock($handle, LOCK_UN);
    // 关闭打开的文件指针
    fclose($handle);
}

$filePath = "./test.txt";
writeFile($filePath, 'Hello world');

// 测试
// 最好使用并发去测试
