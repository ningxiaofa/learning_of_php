<?php

echo "this is router file" . PHP_EOL;

// To reuse a framework router script during development with the CLI web server and later also with a production web server: // 其实，如果基于框架，想应用框架的路由脚本，只要保证index.php入口脚本能[第一时间]执行执行即可
// router.php
if (php_sapi_name() == 'cli-server') {
    /* route static assets and return false */
    if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])){
        header("Content-Type: text/x-script.elisp");
        readfile($_SERVER["SCRIPT_FILENAME"]);
        return false; // 直接返回请求的文件
    } else { 
        echo "<p>Welcome to PHP</p>";
    }
}

/* go on with normal index.php operations */
include_once("./index.php"); 
// 加入上面引入入口脚本代码，请求时，总会放回phpinfo的内容，原因TBD，解决办法TBD
// 可以考虑先使用router1.php
// 此时，访问
// ➜  ～ ✗ curl localhost:8001/index.php
// This is index.php
// string(10) "cli-server"
// You are not using CGI PHP
// ➜  ～ ✗ curl localhost:8001/client.php
// string(10) "cli-server"
// You are not using CGI PHP
// ➜  ～ ✗ 
