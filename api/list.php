<?php


// $arr = '[{"name":"william","age":27},{"name":"williamning","age":27}]';
// var_export(json_decode($arr, true));

$arr = array ( 0 => array ( 'name' => 'william', 'age' => 28, ), 1 => array ( 'name' => 'williamning', 'age' => 28, ), );

echo json_encode($arr);
