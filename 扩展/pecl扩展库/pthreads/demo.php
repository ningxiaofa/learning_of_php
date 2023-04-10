<?php

class MyThread extends Thread {
    public function run() {
        // 线程逻辑
        echo "Hello from thread ", Thread::getCurrentThreadId(), "\n";
    }
}

// 创建新的线程
$thread = new MyThread();

// 开始执行线程
if ($thread->start()) {
    // 主线程逻辑
    echo "Started\n";

    // 等待线程结束
    $thread->join();

    echo "Finished\n";
} else {
    echo "Failed to start\n";
}