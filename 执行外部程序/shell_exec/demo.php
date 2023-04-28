<?php
$output = shell_exec('ls -lart');//ls在执行该php文件的目录下，这里是learning_of_php目录
echo "<pre>$output</pre>";

// ➜  learning_of_php git:(master) ✗ php 执行外部程序/shell_exec/demo.php
// <pre>total 552
// -rw-r--r--   1 mac  staff       0 12 22 14:11 .htaccess
// -rw-r--r--   1 mac  staff   94323 12 22 14:11 PHP 8.1.1 - phpinfo().html
// -rw-r--r--   1 mac  staff  108391 12 22 14:11 PHP Version 7.2.34 - phpinfo().html
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 PHP配置命令
// -rw-r--r--   1 mac  staff      15 12 22 14:11 README.md
// drwxr-xr-x   6 mac  staff     192 12 22 14:11 ajax_serve
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 api
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 aws
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 checkPostParams
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 curl
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 form表单
// drwxr-xr-x   6 mac  staff     192 12 22 14:11 http
// -rw-r--r--   1 mac  staff      17 12 22 14:11 index.php
// -rw-r--r--   1 mac  staff       0 12 22 14:11 nginx.htaccess
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 oop
// -rw-r--r--   1 mac  staff   38412 12 22 14:11 phpinfo.txt
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 retry exec
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 tempnam函数的使用
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 web安全
// drwxr-xr-x   5 mac  staff     160 12 22 14:11 不同PHP版本
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 代码简写
// drwxr-xr-x   5 mac  staff     160 12 22 14:11 在PHP中使用协程实现多任务调度
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 块级作用域
// drwxr-xr-x   7 mac  staff     224 12 22 14:11 字符串
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 字符串中拼接方法调用
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 字节
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 对象序列化
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 对象转换为数组
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 并发控制
// drwxr-xr-x   6 mac  staff     192 12 22 14:11 异常处理
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 手动安装mysql, 项目中测试连接数据库
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 打印参数
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 打印输出
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 支持的协议与封装协议
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 数据类型转换
// drwxr-xr-x   8 mac  staff     256 12 22 14:11 文件系统
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 日期时间
// drwxr-xr-x   9 mac  staff     288 12 22 14:11 是否为同步脚本测试
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 服务检查
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 测试switch语句
// drwxr-xr-x  15 mac  staff     480 12 22 14:11 测试代码片段
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 浏览器URL大小写敏感
// drwxr-xr-x   7 mac  staff     224 12 22 14:11 浮点数精度
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 特性
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 生成UUID
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 生成器
// drwxr-xr-x   6 mac  staff     192 12 22 14:11 编解码
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 网络相关
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 脚本执行流程
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 资源使用情况
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 赋值操作
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 运算符
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 运算运行顺序
// drwxr-xr-x   4 mac  staff     128 12 22 14:11 进程间通信
// drwxr-xr-x   7 mac  staff     224 12 22 14:11 重新执行脚本
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 链式调用
// drwxr-xr-x  10 mac  staff     320 12 22 14:11 闭包使用
// drwxr-xr-x   3 mac  staff      96 12 22 14:11 面试题
// drwxr-xr-x   7 mac  staff     224 12 22 14:11 高级编程
// -rw-r--r--   1 mac  staff      35  2 20 16:52 .gitignore
// drwxr-xr-x   3 mac  staff      96  2 21 10:57 压缩解压缩
// drwxr-xr-x   6 mac  staff     192  2 21 11:00 函数
// drwxr-xr-x  16 mac  staff     512  2 22 13:22 数组函数
// -rw-r--r--   1 mac  staff    1397  3 20 11:19 执行php脚本-踩坑点
// drwxr-xr-x   8 mac  staff     256  3 20 14:58 扩展
// -rw-r--r--   1 mac  staff   12292  3 20 15:11 .DS_Store
// drwxr-xr-x   9 mac  staff     288  3 31 09:45 cli
// drwxr-xr-x@  8 mac  staff     256  4  7 14:39 ..
// drwxr-xr-x  11 mac  staff     352  4 10 14:58 功能模块实现-***
// drwxr-xr-x  10 mac  staff     320  4 10 16:24 变量
// drwxr-xr-x   8 mac  staff     256  4 13 09:44 流程控制
// drwxr-xr-x  15 mac  staff     480  4 24 09:33 .git
// drwxr-xr-x  74 mac  staff    2368  4 24 09:51 .
// drwxr-xr-x   3 mac  staff      96  4 24 09:51 执行外部程序
// </pre>%                                                                                                                                                                                        
// ➜  learning_of_php git:(master) ✗ 

