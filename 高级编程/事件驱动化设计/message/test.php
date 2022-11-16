<?php

$mesg_key = ftok(__FILE__, 'm');
var_dump($mesg_key); // int(1829823992)

$mesg_key = ftok('/Users/huangbaoyin/Documents/Code/php/learning_of_php/高级编程/事件驱动化设计/message/msg.php', 'm');
var_dump($mesg_key); // int(1829814203)