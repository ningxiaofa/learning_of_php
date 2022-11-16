### [鸟哥-2008-关于PHP你可能不知道的－PHP的事件驱动化设计](https://www.laruence.com/2008/04/21/101.html#comment-388654)


### 描述
最近在做一个需要用到异步PHP的项目， 翻阅PHP源码的时候，发现了三个没有用过的模块，「「「sysvsem, sysvshm, sysvmsg,」」」 一番研究以后，受益非浅。
在PHP中有这么一族函数，他们是对UNIX的V IPC函数族的包装。
它们很少被人们用到，但是它们却很强大。巧妙的运用它们，可以让你事倍功半。
它们包括：

```bash
信号量(Semaphores) 
共享内存(Shared Memory) 
进程间通信(Inter-Process Messaging, IPC)
```

基于这些，我们完全有可能将PHP包装成一基于消息驱动的系统。
但是，首先，我们需要介绍几个重要的基础:

1. ftok

int ftok ( string pathname, string proj )
//ftok将一个路径名pathname和一个项目名(必须为一个字符), 转化成一个整形的用来使用系统V IPC的key


2. ticks
Ticks是从PHP 4.0.3开始才加入到PHP中的，它是一个在declare代码段中解释器每执行N条低级语句就会发生的事件。N的值是在declare中的directive部分用ticks=N来指定的。

function getStatus($arg){
    print_r(connection_status());
    debug_print_backtrace();
}
register_tick_function("getStatus", true);
declare(ticks=1){
    for($i =1; $i<999; $i++){
        echo "hello";
    }
}
unregister_tick_function("getStatus");
这个就基本相当于：

function getStatus($arg){
    print_r(connection_status());
    debug_print_backtrace();
}
register_tick_function("getStatus", true);
declare(ticks=1){
    for($i =1; $i<999; $i++){
        echo "hello"; getStatus(true);
    }
}
unregister_tick_function("getStatus");