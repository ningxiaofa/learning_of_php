<?php

// 需要实现Redis

function getCycleIdFromRedis($max, $min = 0) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $key_id = 'cycle_id_generator';

    $cycle_id = $redis->incr($key_id);
    
    if ($cycle_id > $max) {
        // 设置"锁键"的结果 = 获取互斥结果
        $key_lock = 'cycle_id_lock';
        if (!$redis->setnx($key_lock, 1)) {
            return null;
        }

        $cycle_id = $min;
        $redis->set($key_id, $cycle_id);

        // 最后别忘记释放互斥锁
        $redis->delete($key_lock);
    }

    $redis->close();

    return $cycle_id;
}


function getCycleId($max, $min = 0) {
    $cycle_id = getCycleIdFromRedis($max, $min);
    if (!is_null($cycle_id)) {
        return $cycle_id;
    }
    // 稍微等待下正在更改的进程
    usleep(500);
    // 这里使用递归,直至获取成功  并发很高,cycle_id重置很频繁时慎用.
    return getCycleId($max, $min);
}

// 优化
// 审查代码我们会发现，如果 max-min 的值很小的话，redis 会需要经常重置 key 的值，也就经常需要加锁，重试也就很多。这里，我提供一个优化方法：

// 我们将其 max 设置为一个很大的值（要能被 max-min 整除），返回值时稍做处理，返回 $current % ($max - $min) + $min;。这样，key 需要递增到一个很大的值才会被重置，加锁逻辑和外层逻辑会很少执行到，达到提升效率的目的。

// 总结：
// 这里简单的评价一下上面所说的三种方法：

// 性能上没有测试，而且 redis 的性能跟 ID 的大小差值相关，不过猜测在ID大小差值大的情况下 redis 应该更好一点。

// 代码上非常直观，使用 mysql 非常简洁，而且 redis 要自己实现自旋，比较恶心。

// 实现上，当然是文件最为方便，无任何添加。
