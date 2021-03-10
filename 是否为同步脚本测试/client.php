<?php
// exit('client');

require_once('./testCURL.php');
require_once(dirname(__DIR__) . '/curl/cURL-request-motheds.php');

// 任务一: 请求接口 通过 curl
$url = 'http://localhost:8888/是否为同步脚本测试/server.php?yep=??';
// $url = 'baidu.com';
// $url = 'http://124.70.147.157/'; // 个人站点

echo 'testCurl -- <a href="http://localhost:8888/是否为同步脚本测试/server.php?yep=??" target="_blank">http://localhost:8888/是否为同步脚本测试/server.php?yep=??</a> --- Begin' . "<br />";

// $content = testCurl($url);
$content = geturl($url); // 使用这种方法, 浏览器一直处于请求之中 pending, 原因TBD

if($content){
    echo 'testCurl -- <a href="http://localhost:8888/是否为同步脚本测试/server.php?yep=??">http://localhost:8888/是否为同步脚本测试/server.php?yep=??</a> --- Over';
}

exit('stop');
