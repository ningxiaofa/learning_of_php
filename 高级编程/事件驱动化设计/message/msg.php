<?php

$mesg_key = ftok(__FILE__, 'm');
$mesg_id = msg_get_queue($mesg_key, 0666);

register_tick_function("fetchMessage", $mesg_id);

function fetchMessage($mesg_id)
{
    if (!is_resource($mesg_id)) {
        print_r("Mesg Queue is not Ready\n");
    }
    if (msg_receive($mesg_id, 0, $mesg_type, 1024, $mesg, false, MSG_IPC_NOWAIT)) {
        print_r("Process got a new incoming MSG: $mesg");
    }
}

declare(ticks=2) {
    $i = 0;
    while (++$i < 100) {
        if ($i % 5 == 0) {
            msg_send($mesg_id, 1, "Hi: Now Index is :" . $i);
        }
    }
}

// msg_remove_queue($mesg_id);

// 在这个例子中，首先将我们的PHP执行Process加入到一个由ftok生成的Key所获得的消息队列中。
// 然后，通过Ticks，没隔俩个语句，就去查询一次消息队列。
// 然后模拟了消息发送。

// 在浏览器访问这个脚本，结果如下：
// 说明要启动一个http server :  php -S localhost:8100 
// http://localhost:8100/高级编程/事件驱动化设计/message/msg.php
    // Mesg Queue is not Ready Process got a new incoming MSG: s:19:"Hi: Now Index is :5";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :10";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :15";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :20";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :25";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :30";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :35";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :40";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :45";Mesg Queue is not Ready Process got a new incoming MSG: s:20:"Hi: Now Index is :50";

    // 访问多次，结果都是不变的.

// 其实也可以直接cli访问，
    // 输出结果: 输出结果，一直在变化，最后cli下阻塞，而且导致http下，也是阻塞，无法响应
    // ➜  learning_of_php git:(master) ✗ php 高级编程/事件驱动化设计/message/msg.php
    // Mesg Queue is not Ready
    // Process got a new incoming MSG: s:19:"Hi: Now Index is :5";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :10";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :15";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :20";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :25";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :30";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :35";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :40";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :45";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :50";%                                                                    
    // ➜  learning_of_php git:(master) ✗ php 高级编程/事件驱动化设计/message/msg.php
    // Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :55";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :60";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :65";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :70";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :75";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :80";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :85";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :90";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :95";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:19:"Hi: Now Index is :5";%                                                                     
    // ➜  learning_of_php git:(master) ✗ php 高级编程/事件驱动化设计/message/msg.php
    // Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :10";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :15";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :20";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :25";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :30";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :35";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :40";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :45";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :50";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :55";%                                                                    
    // ➜  learning_of_php git:(master) ✗ php 高级编程/事件驱动化设计/message/msg.php
    // Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :60";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :65";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :70";Mesg Queue is not Ready
    // Process got a new incoming MSG: s:20:"Hi: Now Index is :75";


// 看到这里是不是，大家已经对怎么模拟PHP为事件驱动已经有了一个概念了？ 别急，我们继续完善。
