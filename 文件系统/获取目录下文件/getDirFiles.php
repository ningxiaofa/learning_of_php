<?php

class GetFiles
{
    public function getAllFiles($path, &$files)
    {
        if (is_dir($path)) {
            $dp = dir($path);
            while ($file = $dp->read()) {
                if ($file != "." && $file != "..") {
                    $this->getAllFiles($path . "/" . $file, $files);
                }
            }
            $dp->close();
        }

        if (is_file($path)) {
            $files[] = $path;
        }
    }

    public function getFileNamesByDir($dir)
    {
        $files = array();
        $this->getAllFiles($dir, $files);
        return $files;
    }
}


$fileNames = (new GetFiles)->getFileNamesByDir("./test");
//打印所有文件名，包括路径
// var_dump($fileNames);
// Out: array(6) {
//     [0]=>
//     string(12) "./test/1.txt"
//     [1]=>
//     string(12) "./test/2.txt"
//     [2]=>
//     string(12) "./test/3.txt"
//     [3]=>
//     string(17) "./test/test/1.txt"
//     [4]=>
//     string(17) "./test/test/2.txt"
//     [5]=>
//     string(17) "./test/test/3.txt"
// }

foreach ($fileNames as $value) {
    print $value . PHP_EOL;
}
// Out: ./test/1.txt
// ./test/2.txt
// ./test/3.txt
// ./test/test/1.txt
// ./test/test/2.txt
// ./test/test/3.txt
