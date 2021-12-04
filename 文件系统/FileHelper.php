<?php

namespace  app\utils;

class FileHelper
{
    /**
     * Record
     */
    public function record($filePath, $content)
    {
        $fileInfo = explode(DIRECTORY_SEPARATOR, $filePath);
        unset($fileInfo[count($fileInfo) - 1]);
        $fileDir = implode(DIRECTORY_SEPARATOR, $fileInfo);

        $this->addDir($fileDir);

        $mode = 'w';
        if (file_exists($filePath)) {
            $mode = 'a';
        }

        $handle = fopen($filePath, $mode);

        if (!$handle){
            echo "Unable to open file: {$filePath} \r\n";
            return;
        }

        do {
            usleep(100);
        } while (!flock($handle, LOCK_EX));

        fwrite($handle, $content);
        flock($handle, LOCK_UN);
        fclose($handle);
    }

    public function addDir($path){
        return is_dir($path) || (!mkdir($path, 0755, true) && !is_dir($path));
    }

    /**
     * Read all content once time，For small file
     */
    public function read($filePath)
    {
        if(!file_exists($filePath)){
            echo "Unable to read file since not found: {$filePath} \r\n";  
            return;
        }

        return file_get_contents($filePath);
    }

    /**
     * Read all content once time，For small file
     */
    public function exists($filePath)
    {
        if(file_exists($filePath)){
            return true;
        }

        return false;
    }


    /**
     * Remove file
     */
    public function remove($filePath)
    {
        if(!file_exists($filePath)){
            echo "Unable to remove file since not found: {$filePath} \r\n";  
            return;
        }

        return unlink($filePath);
    }
}