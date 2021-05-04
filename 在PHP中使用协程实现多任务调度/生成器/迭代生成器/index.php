<?php

// 一个简单的例子

function xrange($start, $end, $step = 1){
    for($i = $start; $i <= $end; $i += $step){
        yield $i;
    }
}

foreach (xrange(1, 1000000) as $num) {
    echo $num, "\n";
}