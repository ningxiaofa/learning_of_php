<?php

// 附加状态 
// 方式一 使用use
// 其实就是传递额外的变量
$extra = 'ning';
$newRet3 = array_map(function($ele) use ($extra) {
    return $ele . '...' . $extra;
}, $ret);
var_dump($newRet3);
// array(3) {
//     [0]=>
//     string(12) "hello...ning"
//     [1]=>
//     string(12) "world...ning"
//     [2]=>
//     string(14) "william...ning"
//   }

// 方式二 使用bindTo
// 参见App.php