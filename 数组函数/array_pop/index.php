<?php

$ret = [
    [
        1, 2, 3
    ],
    [
        4, 5, 6
    ],
    [
        7, 8, 9
    ],
];

$val = array_pop($ret);
var_dump($val);
// Output:
// ➜  learning_of_php git:(master) php 数组函数/array_pop/index.php
// array(3) {
//   [0]=>
//   int(7)
//   [1]=>
//   int(8)
//   [2]=>
//   int(9)
// }
// ➜  learning_of_php git:(master) ✗ 
