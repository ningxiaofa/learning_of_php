<?php

// 优化，如何只是获取$_SERVER['argv']，可以直接使用变量var_dump($argv);
// https://www.php.net/manual/zh/reserved.variables.argv.php
// ➜  learning_of_php git:(master) ✗ php 变量/超级全局变量/argv.php arg1 arg2 arg3 

var_dump($argv);
// array(4) {
//     [0]=>
//     string(35) "变量/超级全局变量/index.php"
//     [1]=>
//     string(4) "arg1"
//     [2]=>
//     string(4) "arg2"
//     [3]=>
//     string(4) "arg3"
//   }

// 注意: 这个变量仅在 register_argc_argv 打开时可用。[https://www.php.net/manual/zh/ini.core.php#ini.register-argc-argv]
// 但是在cli下，register_argc_argv已经被硬编码为On，其实不单单是这个参数，很多参数在cli下都被硬编码，而且value通常为true/On 打开状态. [我想原因应该是cli下影响比较大，仅仅是个别的用户]

echo "--------------------------------------------------------------------------------" . PHP_EOL;

class A
{
    public static function b()
    {
        var_dump($argv); // 需要声明为全局变量, -- https://stackoverflow.com/questions/11924716/argv-in-a-class
        var_dump(isset($argv));
        var_dump(empty($argv));
        
    }
}

A::b();

// Output
// ➜  learning_of_php git:(master) ✗ php 变量/超级全局变量/argv.php arg1 arg2 arg3
// PHP Warning:  Undefined variable $argv in /Users/kumu/Documents/code/php-projects/learning_of_php/变量/超级全局变量/argv.php on line 7

// Warning: Undefined variable $argv in /Users/kumu/Documents/code/php-projects/learning_of_php/变量/超级全局变量/argv.php on line 7
// NULL
// bool(false)
// bool(true)
// ➜  learning_of_php git:(master) ✗ 

// So:
// Please note that, $argv and $argc need to be declared global, while trying to access within a class method.

