<?php

echo "this is client.php" . PHP_EOL;

$sapi_type = php_sapi_name();
var_dump($sapi_type);
if (substr($sapi_type, 0, 3) == 'cgi') {
    echo "You are using CGI PHP\n";
} else {
    echo "You are not using CGI PHP\n";
}

// 输出
// string(3) "cli"
// You are not using CGI PHP
