<?php

// https://www.php.net/manual/pt_BR/function.str-contains.php
// (PHP 8)

// str_contains — Determine if a string contains a given substring

// 说明 ¶
// str_contains(string $haystack, string $needle): bool

// 注意这点，如果是检查是否包含空字符串，总是返回true，而且这是没有意义的
if (str_contains('abc', '')) {
    echo "Checking the existence of the empty string will always return true";
}

echo PHP_EOL;

if (str_contains('abc', 'a')) {
    echo 'Yep';
}

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/str_contains.php
// Checking the existence of the empty string will always return true
// Yep                         
// ➜  learning_of_php git:(master) ✗ 


echo PHP_EOL;

$string = 'The lazy fox jumped over the fence';

if (str_contains($string, 'lazy')) {
    echo "The string 'lazy' was found in the string\n";
}

if (str_contains($string, 'Lazy')) {
    echo 'The string "Lazy" was found in the string';
} else {
    echo '"Lazy" was not found because the case does not match';
}

// The string 'lazy' was found in the string
// "Lazy" was not found because the case does not match
