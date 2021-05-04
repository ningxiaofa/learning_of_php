<?php

function getCycleIdFromFile($max, $min = 0) {
    $handler = fopen('./tmp/cycle_id_generator.txt', 'c+');
    if (!flock($handler, LOCK_EX)) {
        throw new Exception('error_get_file_lock!');
    }
    
    $cycle_id = trim(fread($handler, 9));
    $cycle_id++;

    if ($cycle_id > $max) {
        $cycle_id = $min;
    }

    // 文件指针返回到文件头,并向文件内写入新的cycle_id
    rewind($handler);
    fwrite($handler, $cycle_id);

    // 多写入一些空格为了防止数值升到多位后,突然置为少位后面的数字仍保留
    fwrite($handler, str_repeat(' ', 9));

    flock($handler, LOCK_UN);

    return $cycle_id;
}

$ret = getCycleIdFromFile(10);
var_dump($ret);

