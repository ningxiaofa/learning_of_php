<?php

$sig = [];

if(empty($sig['is_blocked'])){
    echo 'yep, empty() can be instead of isset()' . PHP_EOL;
}else{
    echo 'nop, empty() can not be instead of isset()' . PHP_EOL;
}

// 语法
// bool empty ( mixed $var )
// 参数说明：

// $var：待检查的变量。
// 注意：在 PHP 5.5 之前，empty() 仅支持变量；任何其他东西将会导致一个解析错误。换言之，下列代码不会生效：
// 如下
$ret = empty(trim($sig['is_blocked']));
var_dump($ret);
// 如果是PHP 5.5 之后，依然是可以的

// empty(trim($name))
// 作为替代，应该使用:

// trim($name) == false
// empty() 并不会产生警告，哪怕变量并不存在。 这意味着 empty() 本质上与 !isset($var) || $var == false 等价。

