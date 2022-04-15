<?php

// https://www.php.net/manual/zh/wrappers.php
// 支持的协议和封装协议 ¶
// PHP 带有很多内置 URL 风格的封装协议，可用于类似 fopen()、 copy()、 file_exists() 和 filesize() 的文件系统函数。 除了这些封装协议，还能通过 stream_wrapper_register() 来注册自定义的封装协议。

// 注意: 用于描述一个封装协议的 URL 语法仅支持 scheme://... 的语法。 scheme:/ 和 scheme: 语法是不支持的。

// 目录 ¶
// file:// — 访问本地文件系统
// http:// — 访问 HTTP(s) 网址
// ftp:// — 访问 FTP(s) URLs
// php:// — 访问各个输入/输出流（I/O streams）
// zlib:// — 压缩流
// data:// — 数据（RFC 2397）
// glob:// — 查找匹配的文件路径模式
// phar:// — PHP 归档
// ssh2:// — 安全外壳协议 2
// rar:// — RAR
// ogg:// — 音频流
// expect:// — 处理交互式的流

// 值的认真去学习一下～～