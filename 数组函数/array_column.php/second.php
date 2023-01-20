<?php
//  使用 index_key[第三个] 参数来重新索引数组--非常好用
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
 
$first_names = array_column($records, null, 'id');
print_r($first_names);

// ➜  learning_of_php git:(master) ✗ php 数组函数/array_column.php/second.php
// Array
// (
//     [2135] => Array
//         (
//             [id] => 2135
//             [first_name] => John
//             [last_name] => Doe
//         )

//     [3245] => Array
//         (
//             [id] => 3245
//             [first_name] => Sally
//             [last_name] => Smith
//         )

//     [5342] => Array
//         (
//             [id] => 5342
//             [first_name] => Jane
//             [last_name] => Jones
//         )

//     [5623] => Array
//         (
//             [id] => 5623
//             [first_name] => Peter
//             [last_name] => Doe
//         )

// )
// ➜  learning_of_php git:(master) ✗ 