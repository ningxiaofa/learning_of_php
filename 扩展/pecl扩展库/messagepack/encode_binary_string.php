<?php
// 安装 MessagePack 扩展
$mp = new MessagePack();
$data = [
    'name' => 'Tom',
    'age' => 18,
    'score' => [89, 92, 95]
];
// 将 PHP 数组编码为二进制格式
$packed = $mp->pack($data);
var_dump($packed); // string(28) "��name�Tom�age�score�\000Y\_"
// 将二进制格式转换为 JSON 格式的文本字符串
$json = json_encode($packed); // false 没办法序列化二进制字符串
var_dump($json); //bool(false)

// 这个例子中，我们先安装了 MessagePack 扩展。
// 然后，我们定义了一个 PHP 数组 $data，包含了一个字符串、一个整数和另一个包含三个整数的数组。
// 接着，我们使用 MessagePack 对这个数组进行编码，得到了一个二进制格式的数据。
// 最后，我们将这个二进制格式的数据转换为 JSON 的文本格式，并输出结果。
// 输出的结果可以传输给其他需要解析协议的系统，快速传递数据。

// 当然，使用不同的序列化方式，实现过程有所不同，上述代码只是作为一个例子，只要了解序列化和反序列化的概念，即使使用其他方式也应该容易上手。

// 修改
$unpacked = $packed = $mp->unpack($packed);
var_dump($unpacked);

// 执行结果
// ➜  learning_of_php git:(master) ✗ php 扩展/1/messagepack/encode_binary_string.php
// /Users/mac/Documents/code/php/learning_of_php/扩展/1/messagepack/encode_binary_string.php:11:
// string(28) "��name�Tom�age�score�\000Y\_"
// /Users/mac/Documents/code/php/learning_of_php/扩展/1/messagepack/encode_binary_string.php:14:
// bool(false)
// /Users/mac/Documents/code/php/learning_of_php/扩展/1/messagepack/encode_binary_string.php:26:
// array(3) {
//   'name' =>
//   string(3) "Tom"
//   'age' =>
//   int(18)
//   'score' =>
//   array(3) {
//     [0] =>
//     int(89)
//     [1] =>
//     int(92)
//     [2] =>
//     int(95)
//   }
// }
// ➜  learning_of_php git:(master) ✗ 