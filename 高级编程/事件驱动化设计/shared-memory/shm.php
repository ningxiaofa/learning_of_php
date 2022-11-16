<?php

// 内存共享
// PHP sysvshm提供了一个内存共享方案:sysvshm，它是和sysvsem,sysvmsg一个系列的，但在此处，我并没有使用它，我使用的shmop系列函数，结合TIcks 

// https://www.php.net/manual/zh/book.shmop.php

function memoryUsage()
{
    printf("%s: %s<br/>", date("H:i:s", time()), memory_get_usage());
    //var_dump(debug_backtrace());
    //var_dump(__FUNCTION__);
    //debug_print_backtrace();
}

register_tick_function("memoryUsage");

declare(ticks=1) {
    $shm_key = ftok(__FILE__, 's');
    $shm_id = shmop_open($shm_key, 'c', 0644, 100);
}

printf("Size of Shared Memory is: %s<br/>", shmop_size($shm_id));
$shm_text = shmop_read($shm_id, 0, 100);
eval($shm_text);
if (!empty($share_array)) {
    var_dump($share_array);
    $share_array['id'] += 1;
} else {
    $share_array = array('id' => 1);
}

$out_put_str = "$share_array = " . var_export($share_array, true) . ";";
$out_put_str = str_pad($out_put_str, 100, " ", STR_PAD_RIGHT);
shmop_write($shm_id, $out_put_str, 0);

// 运行这个例子，不断刷新，我们可以看到index在递增。
// 单单使用这个shmop就能完成一下，PHP脚本之间共享数据的功能：以及，比如缓存，计数等等。



// 上面的代码有问题，或许当时没问题，现在有问题，TBD
// 学到的东西，就是PHP可以操作共享内存，进程消失共享内存会消失吗？
// $shm_key = ftok(__FILE__, 's');
// $shm_id = shmop_open($shm_key, 'c', 0644, 100);
// $ret = shmop_delete($shm_id);
// var_dump($ret);
// exit;
// 不会。
// 进程间通信使用的数据结构:管道、socket、共享内存、消息队列、信号量等，是属于内核级的，一旦创建后就由内核管理，若进程不对其主动释放，那么这些变量会一直存在，除非重启系统。

// 删除方式：
// 1. 通过代码
// 2. 直接命令删除
// https://www.jianshu.com/p/04ee6fae9a3d
// 查看所欲的共享内存
// ipcs -m 

// 删除共享内存
// ipcrm -M key
// ipcrm -m id

