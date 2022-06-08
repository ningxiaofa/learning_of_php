<?php

$ret = range(1, 10);
// var_export($ret);
// array (
//     0 => 1,
//     1 => 2,
//     2 => 3,
//     3 => 4,
//     4 => 5,
//     5 => 6,
//     6 => 7,
//     7 => 8,
//     8 => 9,
//     9 => 10,
//   )

unset($ret[0], $ret[6]);
// var_export($ret);
// array (
//     1 => 2,
//     2 => 3,
//     3 => 4,
//     4 => 5,
//     5 => 6,
//     7 => 8,
//     8 => 9,
//     9 => 10,
//   )
echo json_encode($ret) . PHP_EOL;
$ret = array_values($ret);
echo json_encode($ret);
// ➜  learning_of_php git:(master) ✗ php  数组函数/array_values/index.php
// {"1":2,"2":3,"3":4,"4":5,"5":6,"7":8,"8":9,"9":10}
// [2,3,4,5,6,8,9,10]%                                                                                   
// ➜  learning_of_php git:(master) ✗ 

// 实践证明，还是要使用 array_values将来array变成连续索引的索引数组，不会是关联数组
// 当然，如果前端不要求索引是连贯的，那就不需要再处理，但是很有可能前端会犯错误，所以，为了避免这种错误，还是要建议要使用这种方式