<?php

$json_str = '{"1":{"value":1,"coin":2},"2":[{"value":20000,"coin":5},{"value":3000,"coin":5}],"3":[{"value":1,"coin":6},{"value":1,"coin":8}],"4":{"value":1,"coin":8}}';
$coin_condition_config = json_decode($json_str,true);
foreach ($coin_condition_config as $k=>$v) {
    //3: clearboard & fullhouse
    if(in_array($k, [2, 3])) {
        $config_item = $v;
        if(!isset($config_item[0])){
            continue;
        }
        foreach ($config_item as $ki=>$item) {
            $key_item = $k.($ki + 1);
            $coin_condition_config[$key_item] = $item;
        }
        unset($coin_condition_config[$k]);
        // break;
    }
}
print_r($coin_condition_config);