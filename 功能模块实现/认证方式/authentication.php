<?php

// 读取请求头:
// getallheaders()
// apache_request_headers()
$reqHeaders = getallheaders();
var_dump($reqHeaders);

// array(8) {
//     ["Authorization"]=>
//     string(26) "Basic d2lsbGlhbToxMjM0NTY=" // base64编码，针对 “用户名:密码”，解码结果为：william:123456
//     ["User-Agent"]=>
//     string(21) "PostmanRuntime/7.29.2"
//     ["Accept"]=>
//     string(3) "*/*"
//     ["Cache-Control"]=>
//     string(8) "no-cache"
//     ["Postman-Token"]=>
//     string(36) "ea03530e-156c-4493-97ef-d1d10332b26f"
//     ["Host"]=>
//     string(14) "localhost:7200"
//     ["Accept-Encoding"]=>
//     string(17) "gzip, deflate, br"
//     ["Connection"]=>
//     string(10) "keep-alive"
//   }
  