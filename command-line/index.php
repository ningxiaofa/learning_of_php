<?php


// 1. start up web server with php internal server
// php -S localhost:8001 -t ./command-line
// Add router file
// php -S localhost:8001 -t ./command-line ./command-line/router.php
// php -S localhost:8001 -t ./command-line ./command-line/router1.php

// As entrance script
echo "This is index.php" . PHP_EOL;
$sapi_type = php_sapi_name();
var_dump($sapi_type);
if (substr($sapi_type, 0, 3) == 'cgi') {
    echo "You are using CGI PHP\n";
} else {
    echo "You are not using CGI PHP\n";
}

// 终端命令下，输入: 
// curl localhost:8001

// 输出
// string(10) "cli-server"
// You are not using CGI PHP