<?php

$data = [ // 注意: $data是一个含有7个元素的数组
    [
        "equip_skill_id" => 3,
        'passive1_id' => 1,
        'real_passive1_name' => 'name_1',
        'passive2_id' => 2,
        'real_passive2_name' => 'name_2',
        'passive3_id' => 3,
        'real_passive3_name' => 'name_3'
    ]
];

foreach ($data as &$value) {
    switch ($value['equip_skill_id']) {
        case $value['passive1_id']:
            $value['equip_skill_real_name'] = $value['real_passive1_name'];
            break;
        case $value['passive2_id']:
            $value['equip_skill_real_name'] = $value['real_passive2_name'];
            break;
        case $value['passive3_id']:
            $value['equip_skill_real_name'] = $value['real_passive3_name'];
        default:
            $value['equip_skill_real_name'] = null;
    }
}

// var_dump($data);
// array(1) {
//     [0]=>
//     &array(8) {
//       ["equip_skill_id"]=>
//       int(3)
//       ["passive1_id"]=>
//       int(1)
//       ["real_passive1_name"]=>
//       string(6) "name_1"
//       ["passive2_id"]=>
//       int(2)
//       ["real_passive2_name"]=>
//       string(6) "name_2"
//       ["passive3_id"]=>
//       int(3)
//       ["real_passive3_name"]=>
//       string(6) "name_3"
//       ["equip_skill_real_name"]=>
//       NULL
//     }
//   }

foreach ($data as &$value) {
    if (empty($value['equip_skill_id'])) {
        $value['equip_skill_real_name'] = null;
        continue;
    }
    if ($value['equip_skill_id'] == $value['passive1_id']) {
        $value['equip_skill_real_name'] = $value['real_passive1_name'];
        continue;
    }
    if ($value['equip_skill_id'] == $value['passive2_id']) {
        $value['equip_skill_real_name'] = $value['real_passive2_name'];
        continue;
    }
    if ($value['equip_skill_id'] == $value['passive3_id']) {
        $value['equip_skill_real_name'] = $value['real_passive3_name'];
        continue;
    }
}
var_dump($data);
// array(1) {
//     [0]=>
//     &array(8) {
//       ["equip_skill_id"]=>
//       int(3)
//       ["passive1_id"]=>
//       int(1)
//       ["real_passive1_name"]=>
//       string(6) "name_1"
//       ["passive2_id"]=>
//       int(2)
//       ["real_passive2_name"]=>
//       string(6) "name_2"
//       ["passive3_id"]=>
//       int(3)
//       ["real_passive3_name"]=>
//       string(6) "name_3"
//       ["equip_skill_real_name"]=>
//       string(6) "name_3"
//     }
//   }
