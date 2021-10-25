<?php

$small_groups = [
    1,
    2,
    3,
    4,
];

if ($count = count($small_groups)) {
    var_export(array_chunk($small_groups, 100)); // 每份子数组100个元素，最后一个可能小于100个元素
}
