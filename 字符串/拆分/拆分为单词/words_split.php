<?php

$string = "DragWoofTear";
$words = preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);
$words = array_map('strtolower', $words);

print_r($words);
$words_str = implode(',', $words);
print_r($words_str);