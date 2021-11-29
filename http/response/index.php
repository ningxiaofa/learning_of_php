<?php

// PHP 返回空对象，null, 空数组
$user = [];
echo json_encode($user); // []
echo json_encode($user ?: new stdClass()); // {}
echo json_encode($user ?: null); // null

// 建议：
// 如果返回的正常结果是对象，
// 如果为空，就返回null
// 至于空数组，应该是复数形式才应如此
