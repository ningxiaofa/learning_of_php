<?php

$PHP = 'PHP';
$php = 'php';
var_dump($PHP, $php);
echo PHP_EOL;

// 输出：
// string(3) "PHP"
// string(3) "php"

// 可以看到是区分大小写的, 类中的属性名[就是类中的变量]也是区分大小写的

// 但是类名，函数名/方法名[类中的函数]，是不区分大小写的.
// 变量/对象比较.php

function test(){
    echo 'test';
}

// 如果解开注释，就提示错误：重复声明
// function Test(){
//     echo 'Test';
// }

