<?php

$index = 1;
if($index1 = $index > 0){
    echo $index1;
}
$user_all_joined_nid = array (
    0 => 'sig_lrk35jmb88amoll7meojvctci4',
    1 => 'sig_42fd34fq6mjj3l0e77anok5u3p',
    2 => 'sig_96ft91d0eo70c63vt5rkpi88ap',
    3 => 'sig_d1ver2h3kmfeavkm1imcmu1gep',
    4 => 'sig_bcnvf9arlnmakd983nmr4tktpn',
    5 => 'sig_kia1j2s883nmppbtqpeaq5q30h',
    6 => 'sig_mipi4cioocf0lfque9s0to32fv',
);

if($index1 = array_search('sig_42fd34fq6mjj3l0e77anok5u3p', $user_all_joined_nid) > -1){
    echo $index1;
}


$sig_joined = [
    'data' => [
        [
            "can_apply" => "1",
            "kname" => "Test - Public Group",
            "leader" => "Z8HLnNW4gmzgrcvo",
            "year" => "2021",
            "cssk" => "normal1638515855",
            "show_stats" => "1",
            "is_show_post" => "1",
            "nid" => "sig_va14o4uccupjr15km6s1lu5krg",
            "avatar" => "https://dev-cdn.kumuapi.com/team/259-1638515820762-1867740040.png",
            "is_show_mem" => "1",
            "short_des" => "Test only",
            "long_des" => "Sorting of Members list",
            "kstatus" => "normal",
            "members" => "9",
            "create" => "1638515855",
            "bg_img" => "https://dev-cdn.kumuapi.com/team/259-1638515826021-1285101805.jpg",
            "bid" => "Z8HLnNW4gmzgrcvo"
        ],
        [
            "can_apply" => "1",
            "kname" => "Public Group Testing",
            "leader" => "SKN8pAAwzMGN6zbY",
            "year" => "2021",
            "cssk" => "normal1630466483",
            "show_stats" => "1",
            "is_show_post" => "1",
            "nid" => "sig_kia1j2s883nmppbtqpeaq5q30h",
            "avatar" => "https://dev-cdn.kumuapi.com/team/153-1630466438652-986019330.png",
            "is_show_mem" => "1",
            "im_id" => "164867638099970",
            "short_des" => "For testing",
            "long_des" => "For testing",
            "kstatus" => "normal",
            "members" => "19915",
            "create" => "1630466483",
            "bg_img" => "https://dev-cdn.kumuapi.com/team/153-1630466449675-1594536902.jpeg",
            "bid" => "SKN8pAAwzMGN6zbY"
        ],
        [
            "can_apply" => "1",
            "kname" => "Cosplay",
            "leader" => "SKN8pAAwzMGN6zbY",
            "year" => "2021",
            "cssk" => "normal1631618592",
            "show_stats" => "1",
            "is_show_post" => "1",
            "nid" => "sig_mipi4cioocf0lfque9s0to32fv",
            "avatar" => "https://dev-cdn.kumuapi.com/team/153-1631618575689-1398207405.png",
            "is_show_mem" => "1",
            "im_id" => "164867638099969",
            "short_des" => "Cosplay, Anime, Manga Lovers",
            "long_des" => "This is the official group for cosplayers of all shapes and sizes. All topics must be related to the group or atleast related to cosplay. That's all~",
            "kstatus" => "normal",
            "members" => "39",
            "create" => "1631618592",
            "bg_img" => "https://dev-cdn.kumuapi.com/team/153-1631618581665-1666954644.png",
            "bid" => "SKN8pAAwzMGN6zbY"
        ]
    ],
    'lastEvaluatedKey' => [
        16.323378,
        "1631618592"
    ]
];

$arr = [
    1 => '111',
    0 => '000',
    2 => '222'
];

// var_dump($arr);
// array(3) {
//     [1]=>
//     int(1)
//     [0]=>
//     int(0)
//     [2]=>
//     int(2)
//   }

// $arr = array_values($arr);
// array(3) {
//     [0]=>
//     int(1)
//     [1]=>
//     int(0)
//     [2]=>
//     int(2)
//   }
var_dump($arr);

foreach($arr as $k => $v){
    // var_dump($k, $v);
}
// int(1)
// int(1)
// int(0)
// int(0)
// int(2)
// int(2)

// construct new array
$new_arr = [];
for($i = 0; $i < 20; $i++){
    $new_arr[strval($i)] = $i;
}
var_dump($new_arr);

foreach($arr as $k => $v){
    $new_arr[strval($k)] = $v;
}

var_dump($new_arr);
// array(20) {
//     [0]=>
//     string(3) "000"
//     [1]=>
//     string(3) "111"
//     [2]=>
//     string(3) "222"
//     [3]=>
//     int(3)
//     [4]=>
//     int(4)
//     [5]=>
//     int(5)
//     [6]=>
//     int(6)
//     [7]=>
//     int(7)
//     [8]=>
//     int(8)
//     [9]=>
//     int(9)
//     [10]=>
//     int(10)
//     [11]=>
//     int(11)
//     [12]=>
//     int(12)
//     [13]=>
//     int(13)
//     [14]=>
//     int(14)
//     [15]=>
//     int(15)
//     [16]=>
//     int(16)
//     [17]=>
//     int(17)
//     [18]=>
//     int(18)
//     [19]=>
//     int(19)
//   }
