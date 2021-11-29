<?php
header("HTTP/1.0 404 Not Found");
/* This will give an error. Note the output
 * above, which is before the header() call */
// header('Location: http://www.baidu.com/');
exit;


//输出
// ob_start();
// header("location: 1.html");
// echo "send data";
// header("location: 2.html"); //replaces 1.html
// ob_end_flush(); //now the headers are sent

//扩展
//headers_sent() - 检测 HTTP 头是否已经发送

