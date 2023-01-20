<?php

// 传递引用
function A(&$data){
    $data['sex'] = 'male';
}

$initData = [];
$initData['data'] = [
    'name' => 'william',
    'age' => 28,
];

A($initData['data']);
var_dump($initData);

//output
// array(1) {
//     ["data"]=>
//     array(3) {
//       ["name"]=>
//       string(7) "william"
//       ["age"]=>
//       int(28)
//       ["sex"]=>
//       string(4) "male"
//     }
//   }
