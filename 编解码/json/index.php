<?php

$testStr = "This is 测试数据";
$decodedStr = json_encode($testStr);
// echo $decodedStr; exit;
// output:
// This is \u6d4b\u8bd5\u6570\u636e

$info['json'] = $decodedStr;
$info['json'] = json_decode($info['json']);
if(json_last_error() != 0){
    throw new \Exception("json转换错误！");
}
var_dump($info);
// output:
// array(1) {
//     ["json"]=>
//     string(20) "This is 测试数据"
//   }
