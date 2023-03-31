<?php

//官方文档: cli模式下，源码中硬编码为0[不可修改]，永不超时，直到脚本执行结束.

//验证cli模式，php脚本最大执行时间
function checkMaxExecTime(){
    set_time_limit(6);
    $i = 0;
    while($i < 10){
        sleep(1);
        echo $i++;
        echo PHP_EOL;
    }

    ini_set('max_execution_time', 6);
    $i = 0;
    while($i < 10){
        sleep(1);
        echo $i++;
        echo PHP_EOL;
    }
}

checkMaxExecTime();
