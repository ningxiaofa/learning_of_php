<?php

// 解决后的代码如下：
// 方式一: 主动生命为超全局变量 -- 推荐，当然直接使用$_SERVER即可
class A1
{
    public static function b()
    {
        global $argv;
        var_dump($argv);
    }
}

A1::b();

// 正常输出
// array(4) {
//     [0]=>
//     string(34) "变量/超级全局变量/argv.php"
//     [1]=>
//     string(4) "arg1"
//     [2]=>
//     string(4) "arg2"
//     [3]=>
//     string(4) "arg3"
//   }