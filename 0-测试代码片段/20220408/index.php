<?php

$arr = [
    'name' => 'william',
    'age' => 29,
];


$ret = array_slice($arr, 0, 10);
var_dump($ret);

// output: no error happen
// array(2) {
//     ["name"]=>
//     string(7) "william"
//     ["age"]=>
//     int(29)
//   }