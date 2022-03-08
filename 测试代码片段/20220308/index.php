<?php

$content = null; // mb_strlen接受的参数类型只能为string，否则会报错
// PHP Deprecated:  mb_strlen(): Passing null to parameter #1 ($string) of type string is deprecated in /Users/kumu/Documents/code/php-projects/learning_of_php/测试代码片段/20220308/index.php on line 7

// Deprecated: mb_strlen(): Passing null to parameter #1 ($string) of type string is deprecated in /Users/kumu/Documents/code/php-projects/learning_of_php/测试代码片段/20220308/index.php on line 7
$content = "";

// Limit: At most 1,000 characters
if (mb_strlen($content) > 1000){
    return $this->error('Content at most 1,000 characters', 400);
}