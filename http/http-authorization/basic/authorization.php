<?php

// https://blog.csdn.net/william_n/article/details/121071885
// https://mp.weixin.qq.com/s/8rHPJezOW6KbWFwFzrinGQ
// HTTP authentication 是一种标准化的校验方式，不会使用 cookie 和 session 相关技术。

// 请求头带有 Authorization: Basic <credentials> 格式的授权字段。
// 其中 credentials 就是 Base64 编码的用户名 + : + 密码（或 token），以后看到 Basic authentication，意识到就是每次请求都带上用户名密码就好了。

// Basic authentication 大概比较适合 serverless，毕竟他没有运行着的内存，无法记录 session，直接每次都带上验证就完事了。

// ------------------------ 验证
// 请求头中，authorization:Basic YWRtaW46TEs4NzVNJnNAUWtqaGFR
$token = 'YWRtaW46TEs4NzVNJnNAUWtqaGFR';

// 登录的账号密码
// admin/LK875M&s@QkjhaQ
$ret = base64_decode($token, true);
// var_dump($ret); // admin:LK875M&s@QkjhaQ


if($ret === 'admin:LK875M&s@QkjhaQ'){
    echo "是的，如你所想";
}else{
    echo "糟糕，出现意外";
}
