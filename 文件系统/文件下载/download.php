<?php

class Download
{
    /**
     * 下载文件
     * @param $filePath
     */
    public function downloadFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "下载文件不存在!";
            exit;
        }
        $fileName = basename($filePath);
        $fp = fopen($filePath, "r");
        $fileSize = filesize($filePath);
        //下载文件需要用到的头
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length: " . $fileSize);
        Header("Content-Disposition: attachment; filename=" . $fileName);
        $buffer = 1024;
        $fileCount = 0;
        while (!feof($fp) && $fileCount < $fileSize) {
            $fileCon = fread($fp, $buffer);
            $fileCount += $buffer;
            echo $fileCon;
        }
        fclose($fp);
    }
}
// 绝对路径
$filePath = __DIR__ . '\download.json';
// 相对路径，一直提示文件不存在！
// $filePath = 'download.json';
$donwload = new Download();
$donwload->downloadFile($filePath);
