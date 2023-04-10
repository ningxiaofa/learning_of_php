<?php

function test() {
    static $num = 0;
    echo "num before: " . $num . php_eol; // 打印之前的值

    for ($i = 0; $i < 100000; $i++) {
        $num++;
    }

    echo "num after: " . $num . php_eol; // 打印修改后的值
}

$threads = [];
for ($j = 1; $j <= 5; ++$j) {
    array_push($threads, new Thread('test'));
}

foreach ($threads as &$t) {
    $t->start();
}

foreach ($threads as &$t) {
    if($t->isrunning()){
       @$t->join();
     }
}