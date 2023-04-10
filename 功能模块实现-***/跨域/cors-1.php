<?php

// header('Access-Control-Allow-Origin:*'); 
// header('Access-Control-Allow-Origin:http://abc.cn');
// header('Access-Control-Allow-Origin:http://api.bob.com');

// 允许所有跨域，但是不建议这样设置
// $allowOrigins = '*';

// 允许多个域名能够跨域访问接口数据
$allowOrigins = [
    // 'https://abc.cn',
    // 'http://api.bob.com'
];

// 获取需要访问接口数据的域名
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if ($allowOrigins === '*') {
    header('Access-Control-Allow-Origin:*');
}

// 判断该域名是否是在我们定义好的数组里面
if (is_array($allowOrigins) && in_array($origin, $allowOrigins)) {
    header('Access-Control-Allow-Origin:' . $origin);
}

echo "This is A server";
