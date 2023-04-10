<?php

// 「代码没经过实践检验，所以，生产中使用要谨慎」

$expire = 10; //有效期10秒
$key = 'lock'; //key
$value = time() + $expire; //锁的值 = Unix时间戳 + 锁的有效期
$status = true;

while ($status) {
    $lock = $redis->setnx($key, $value);
    if (empty($lock)) {
        $value = $redis->get($key);
        if ($value < time()) {
            $redis->del($key);
        }
    } else {
        $status = false;
        //下步操作....
    }
}
