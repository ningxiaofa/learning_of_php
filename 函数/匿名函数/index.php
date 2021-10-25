<?php

// 匿名函数，并且自执行
$realPara = [
    'name' => 'hello',
    'age' => 28
];

(function($para){
    var_dump($para);

})($realPara);
// output:
// array(2) {
//     ["name"]=>
//     string(5) "hello"
//     ["age"]=>
//     int(28)
//   }

// 如果参数放在后面会出现报错
// $realPara = [
//     'name' => 'hello',
//     'age' => 28
// ];
// PHP Notice:  Undefined variable: realPara in /Users/ganhai/Documents/WilliamNing/Source Code/Homestead/learning_of_php/函数/匿名函数/index.php on line 12
// NULL

