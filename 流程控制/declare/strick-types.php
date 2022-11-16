<?php

/**
 * 
严格类型 ¶
默认如果可能，PHP 会强制转化不合适的类型为想要的标量类型。 比如，参数想要 string，传入的是 int， 则会获取 string 类型的变量。

可以按文件开启严格模式。 在严格模式下，只能接受完全匹配的类型，否则会抛出 TypeError。 唯一的例外是 int 值也可以传入声明为 float 的类型。

警告
通过内部函数调用函数时，不会受 strict_types 声明影响。

要开启严格模式，使用 declare 开启 strict_types：

注意:

文件开启严格类型后的内部调用函数将应用严格类型， 而不是在声明函数的文件内开启。 如果文件没有声明开启严格类型，而被调用的函数所在文件有严格类型声明， 那将遵循调用者的设置（开启类型强制转化）， 值也会强制转化。

注意:

只有为标量类型的声明开启严格类型。
 */


declare(strict_types=1);

function sum(int $a, int $b) {
    return $a + $b;
}

try {
    var_dump(sum(1, 2));
    var_dump(sum(1.5, 2.5));
} catch (TypeError $e) {
    echo 'Error: ', $e->getMessage();
}

// ➜  declare git:(master) ✗ php strick-types.php 
// int(3)
// Error: sum(): Argument #1 ($a) must be of type int, float given, called in /Users/huangbaoyin/Documents/Code/php/learning_of_php/流程控制/declare/strick-types.php on line 33%                                                                                                                  
// ➜  declare git:(master) ✗ 

