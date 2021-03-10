<?php

require_once('./testCURL.php');

// 循环调用请求
$url = 'http://news.sohu.com/';
$i = 1;
while($i < 100){
    print $i . PHP_EOL;
    $content = testCurl($url);
    echo $content;
    $i++;
}

exit('stop');
