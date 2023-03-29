<?php

// 证明：
// 当数组作为值传递到函数中时，会产生一个副本，因此会导致内存使用量上升。
// 我们可以通过在脚本中使用memory_get_usage()函数来证明这一点，该函数返回当前PHP进程使用的内存量（以字节为单位）。
function modify_array($arr) { // 当为引用类型时 &$arr 内存使用量差异有时为-32 有时为32bytes 有指针内存占用，以及新元素修改/添加占用，而且分配内存不是一个一个字节分配，而是分配一块内存.
    // 在函数内部修改数组
    $arr[] = 'new item'; // 存在写实拷贝
    // $arr1  = range(1, 1000); //Difference: 64 bytes%   
    // $arr = array_merge($arr, $arr1);
    // var_dump(count($arr));
    return $arr;
}
  
// 创建一个初始数组
$my_array = range(1, 1000000);

// 记录数组修改前的内存使用情况
$start_memory = memory_get_usage();

// 在函数内部修改数组
$new_array = modify_array($my_array);

// 记录数组修改后的内存使用情况
$end_memory = memory_get_usage();

echo "Difference: " . ($end_memory - $start_memory) . " bytes";

// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/arr_prove.php           
// Array
// (
//     [0] => apple
//     [1] => orange
//     [2] => banana
// )
// Array
// (
//     [0] => apple
//     [1] => orange
//     [2] => banana
//     [3] => pear
// )
// Difference: 16781176 bytes%                                                                                                                                                            
// ➜  learning_of_php git:(master) ✗ 
// 简单的示例证明了在数组作为值传递时，会产生一个副本，从而导致额外的内存使用。
