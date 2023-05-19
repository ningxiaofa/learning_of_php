<?php

$arr = [
    1,
    2,
    3,
    4
];

foreach ($arr as $key => $value) {
    switch ($key) {
        case 2:
        case 3:
            $new_arr[] = [
                'type' => $key,
                'key' => $key,
                'value' => $value,
            ];
            break;
        default:
            $new_arr[] = [$value];
            break;
    }
}

print_r($new_arr);
