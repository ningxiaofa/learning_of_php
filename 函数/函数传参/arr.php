<?php

function add_item($arr, $item)
{
    $arr[] = $item;
    return $arr;
}

$my_array = array('apple', 'orange', 'banana');
$new_array = add_item($my_array, 'pear');

print_r($my_array); // 输出：Array ( [0] => apple [1] => orange [2] => banana )
print_r($new_array); // 输出：Array ( [0] => apple [1] => orange [2] => banana [3] => pear )
