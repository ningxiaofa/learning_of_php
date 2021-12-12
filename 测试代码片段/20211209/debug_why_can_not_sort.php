<?php

// https://www.php.net/manual/zh/function.file-get-contents.php
$json_str = file_get_contents('result.json', true);
var_dump($json_str);
$sig_joined = json_decode($json_str, true);
$sig_joined = $sig_joined['data'];


$user_all_joined_nid = [
    "sig_lrk35jmb88amoll7meojvctci4",
    "sig_42fd34fq6mjj3l0e77anok5u3p",
    "sig_96ft91d0eo70c63vt5rkpi88ap",
    "sig_d1ver2h3kmfeavkm1imcmu1gep",
    "sig_bcnvf9arlnmakd983nmr4tktpn",
    "sig_kia1j2s883nmppbtqpeaq5q30h",
    "sig_mipi4cioocf0lfque9s0to32fv",
];

// Reorder
// Construct array
$temp = [];
for($i = 0; $i < 20; $i++){
    $temp[strval($i)] = [];
}

foreach($sig_joined['data'] as $nid){
    if($index = array_search($nid['nid'], $user_all_joined_nid) > -1){
        $temp[strval($index)] = $nid;
    }
}
$new_temp = [];
foreach($temp as $value){
    $value && $new_temp[] = $value;
}
$sig_joined['data'] = array_values($new_temp);
unset($temp);
unset($new_temp);