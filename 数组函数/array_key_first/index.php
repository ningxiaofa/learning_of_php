<?php

$myArray = array('foo' => 'bar', 'baz' => 'qux', 'quux' => 'corge');

// 获取第一个元素的键和值
$firstKey = array_key_first($myArray);
// $firstValue = reset($myArray);
$firstValue = $myArray[$firstKey];

// 输出结果
echo "First key: " . $firstKey . "\n";
echo "First value: " . $firstValue . "\n";

// ➜  learning_of_php git:(master) ✗ php 数组函数/array_key_first/index.php
// First key: foo
// First value: bar
// ➜  learning_of_php git:(master) ✗ 