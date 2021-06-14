<?php

// 要实现DB连接，这里暂时没有实现

function getCycleIdFromMysql($max, $min = 0){
    Db::db()->execute('set autocommit = 0');
    $res = Db::db()->qsqlone('SELECT cycle_id FROM cycle_id_generator WHERE id = 1 FOR UPDATE');

    $cycle_id = $res['cycle_id'] + 1;
    if($cycle_id > $max){
        $cycle_id = $min;
    }

    Db::db()->execute("UPDATE cycle_id_generator SET cycle_id = {$cycle_id} WHERE id = 1");

    Db::db()->execute('commit');
    Db::db()->execute('set autocommit = 1');

    return $cycle_id;
}