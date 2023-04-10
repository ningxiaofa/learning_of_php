<?php

function generateUniqueId() {
    static $lastId = 0;
    return ++$lastId;
}

echo generateUniqueId() . PHP_EOL; // 输出1
echo generateUniqueId() . PHP_EOL; // 输出2
echo generateUniqueId() . PHP_EOL; // 输出3

// ➜  learning_of_php git:(master) ✗ php 变量/静态变量/static_var.php
// 1
// 2
// 3
// ➜  learning_of_php git:(master) ✗ 

// 在这个例子中，每调用一次 generateUniqueId() 函数就会生成一个唯一的 id。
// 由于使用了 static 关键字定义了 $lastId 变量，所以它的值可以被保留下来，并且随着函数不同调用间的执行逐渐递增，因此每次调用生成新 id 时都会基于上一次返回的值加 1。

// 如果没有使用 static 关键字，则变量 $lastId 的值只存在于当前函数调用期间，在下次函数执行时又会重置为初始状态 0。

// 虽然使用 static 带来了方便和灵活性，
// 但也带来了坏处：对于长时间运行的应用程序，可能会导致内存泄漏问题。如果频繁地创建静态变量或者将数据缓存到静态变量中，并且该静态变量占用的空间比较大，则有可能导致内存消耗过多、程序崩溃等问题。因此，在具体实现中需要权衡好利弊得失。

