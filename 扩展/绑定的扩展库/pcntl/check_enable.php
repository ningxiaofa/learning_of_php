<?php

if (function_exists('pcntl_fork')) {
    echo 'pcntl扩展已启用';
} else {
    echo 'pcntl扩展未启用';
}

// 如果您已经启用了pcntl扩展，则会显示“pcntl扩展已启用”的信息；否则则会显示“pcntl扩展未启用”。
// 需要注意的是，在Windows环境下是无法启用pcntl扩展的，该扩展仅支持Linux和Unix系统
