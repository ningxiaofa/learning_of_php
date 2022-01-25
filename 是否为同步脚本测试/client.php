<?php
// exit('client');
// 文档参考
// https://blog.csdn.net/william_n/article/details/103816142

require_once('./testCURL.php');
require_once(dirname(__DIR__) . '/curl/cURL-request-motheds.php');

// 任务一: 请求接口 通过 curl
$url = 'http://localhost:8888/是否为同步脚本测试/server.php?yep=??';
// $url = 'baidu.com';
// $url = 'http://124.70.147.157/'; // 个人站点

echo 'testCurl -- <a href="http://localhost:8888/是否为同步脚本测试/server.php?yep=??" target="_blank">http://localhost:8888/是否为同步脚本测试/server.php?yep=??</a> --- Begin' . "<br />";

// $content = testCurl($url);
$content = geturl($url); // 使用这种方法, 浏览器一直处于请求之中 pending, 原因TBD
// CURL扩展，通过设置timeout超时参数，能实现离弦之箭的效果。不过这种方法会主动断开连接。被调用的服务如果有做连接检测，也会中断服务端脚本的执行。比如我们请求 微信的某个费时接口（20s），我们调用1s就断开连接，微信端是否会维持请求执行20S是不可控的。所以这种方法不推荐大家使用。

if($content){
    echo 'testCurl -- <a href="http://localhost:8888/是否为同步脚本测试/server.php?yep=??">http://localhost:8888/是否为同步脚本测试/server.php?yep=??</a> --- Over';
}

exit('stop');
