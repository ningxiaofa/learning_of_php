<?php

try {
    for ($i = 0; $i <= 9; $i++) {
        echo $i;
        if($i == 5){
            throw new Exception('just test');
        }
    }
} catch (\Throwable $th) {
    var_dump($i); // 可以获取上面最新的$i变量值
    // var_dump($th);
}

// ➜  learning_of_php git:(master) ✗ php 流程控制/for_throw.php/index.php
// 012345/Users/mac/Documents/code/php/learning_of_php/流程控制/for_throw.php/index.php:11:
// int(5)
// ➜  learning_of_php git:(master) ✗ 