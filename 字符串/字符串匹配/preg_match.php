<?php

// https://www.php.net/manual/zh/function.preg-match
// (PHP 4, PHP 5, PHP 7, PHP 8)
// preg_match — 执行匹配正则表达式

// preg_match(
//     string $pattern,
//     string $subject,
//     array &$matches = null,
//     int $flags = 0,
//     int $offset = 0
// ): int|false

preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);

// 使用 PREG_OFFSET_CAPTURE
// Array
// (
//     [0] => Array
//         (
//             [0] => foobarbaz
//             [1] => 0
//         )

//     [1] => Array
//         (
//             [0] => foo
//             [1] => 0
//         )

//     [2] => Array
//         (
//             [0] => bar
//             [1] => 3
//         )

//     [3] => Array
//         (
//             [0] => baz
//             [1] => 6
//         )

// )


// PREG_UNMATCHED_AS_NULL
// 使用该标记，未匹配的子组会报告为 null；未使用时，报告为空的 string。

preg_match('/(a)(b)*(c)/', 'ac', $matches);
var_dump($matches);
preg_match('/(a)(b)*(c)/', 'ac', $matches, PREG_UNMATCHED_AS_NULL);
var_dump($matches);

// 以上例程会输出：

// array(4) {
//   [0]=>
//   string(2) "ac"
//   [1]=>
//   string(1) "a"
//   [2]=>
//   string(0) ""
//   [3]=>
//   string(1) "c"
// }
// array(4) {
//   [0]=>
//   string(2) "ac"
//   [1]=>
//   string(1) "a"
//   [2]=>
//   NULL
//   [3]=>
//   string(1) "c"
// }