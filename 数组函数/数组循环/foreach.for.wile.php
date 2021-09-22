<?php

// foreach
// 适用于索引数组和关联数组
$data = [
    'hello' => 'world',
    'i',
    'love',
    'u'
];
foreach($data as $key => $value) {
    $ret[] = $key . $value;
}
var_dump($ret);

// for
// 只能用于索引数组
$data = [
    'i',
    'love',
    'u'
];
$ret = [];
for($i = 0; $i < count($data); $i++){
    $ret[] = $i . $data[$i];
}
var_dump($ret);

// while
// 只能用于索引数组
$data = [
    'i',
    'love',
    'u'
];
$ret = [];
$i = 0;
while(isset($data[$i])){
    $ret[] = $i . $data[$i];
    $i++;
}
var_dump($ret);
