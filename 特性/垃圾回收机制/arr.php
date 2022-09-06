<?php

// 测试数组的变量赋值和引用赋值的区别
$arr = ['a'];
$arr2 = $arr; // 变量赋值
// $arr2 = &$arr; // 引用赋值
var_dump($arr2);
$arr2 = ['b'];
var_dump($arr, $arr2);

// Output:
// 变量赋值
// array(1) {
//     [0]=>
//     string(1) "a"
//   }
//   array(1) {
//     [0]=>
//     string(1) "a"
//   }
//   array(1) {
//     [0]=>
//     string(1) "b"
//   }

// 引用赋值
// array(1) {
//     [0]=>
//     string(1) "a"
//   }
//   array(1) {
//     [0]=>
//     string(1) "b"
//   }
//   array(1) {
//     [0]=>
//     string(1) "b"
//   }

// 从上面运行的结果可以知道：
// 数组的变量赋值和引用赋值同PHP基本数据类型是一致的

// 但是，似乎数组的元素的赋值，使用变量赋值，也会是引用赋值 ? TBD

$arr = [
    'name' => 'william'
];

// $arr['age'] = $arr;
// var_dump($arr);
// 就是普通的赋值
// array(2) {
//     ["name"]=>
//     string(7) "william"
//     ["age"]=>
//     array(1) {
//       ["name"]=>
//       string(7) "william"
//     }
//   }

$arr['age1'] = &$arr;
var_dump($arr);
// 如果使用引用赋值，就直接发生了递归操作
// array(2) {
//     ["name"]=>
//     string(7) "william"
//     ["age1"]=>
//     *RECURSION*
//   }

// 还是要通过
xdebug_debug_zval('arr'); // 进行分析确认