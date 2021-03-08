<?php

$filename = 'log.txt';
$logPath = dirname(__FILE__).'/'.$filename;

function write($file_path, $content){
    if(file_exists($file_path))
    {
        //"当前目录中，文件存在"，追加
        $myfile = fopen($file_path, "a") or die("Unable to open file!");
        $txt = "\n" . $content . '---' . "【" . date('Y-m-d H:i:s', time()) . "】";
        fwrite($myfile, $txt);
        //记得关闭流
        fclose($myfile);
    }else{
        //"当前目录中，文件不存在",新写入
        $myfile = fopen($file_path, "w") or die("Unable to open file!");
        $txt = $content . '---' . "【" . date('Y-m-d H:i:s', time()) . "】";
        fwrite($myfile, $txt);
        //记得关闭流
        fclose($myfile);
    }
}

write($logPath,'logbegin');
// write($logPath,'json_encode($obj)); // 有一个问题, 私有属性拿不到, 解决办法: TBD
