<?php

// https://mp.weixin.qq.com/s/D3MzmTImfYBjr1vWWdo-PQ //从并发处理谈PHP进程间通信（二）System V IPC

function getCycleIdFromSystemV($max, $min = 0)
{
    $key = ftok('./cycleIdFromSystemV.tok', 'd');
    $var_key = 0;
    $sem_id = sem_get($key);
    $shm_id = shm_attach($key, 4096);

    if (sem_acquire($sem_id)) {
        $cycle_id = intval(shm_get_var($shm_id, $var_key));
        $cycle_id++;
        if ($cycle_id > $max) {
            $cycle_id = $min;
        }
        shm_put_var($shm_id, $var_key, $cycle_id);

        shm_detach($shm_id);
        sem_release($sem_id);

        return $cycle_id;
    }

    return false;
}

$ret = getCycleIdFromSystemV(10);
var_dump($ret);
