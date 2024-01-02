<?php
$seed = 12345; // 初始种子

$seeds = array(); // 存储生成的随机种子

mt_srand($seed); // 设置初始种子

// 生成50个随机种子
for ($i = 0; $i < 5; $i++) {
    $random_seed = mt_rand(); // 生成随机种子
    $seeds[] = $random_seed; // 将随机种子添加到数组中
}

// 打印生成的随机种子
foreach ($seeds as $index => $random_seed) {
    echo "Seed " . ($index + 1) . ": " . $random_seed . "\n";
}