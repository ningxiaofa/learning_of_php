<?php

$user = [
    // 'status' => 'delete',
    'status' => 'normal'
];

$data = [];
if(isset($user['status'])){
    $status = $user['status'];
    switch ($status) {
        case 'delete':
            $status = 0;
            break;
        case 'normal':
            $status = 1;
            break;
        case 'lock':
            $status = 2;
            break;
    }
    $data['status'] = $status;
}
var_dump($data);
// array(1) {
//     ["status"]=>
//     int(0)
//   }


// array(1) {
//     ["status"]=>
//     int(1)
//   }

// 可以使用这种方式，进行变量的覆盖以及内存释放