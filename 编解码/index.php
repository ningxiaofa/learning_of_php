<?php

$lek = '';
$decoded_lek = base64_decode($lek) ?? '';
var_dump($decoded_lek); // ""

$last_eval_key = json_decode($decoded_lek, true);
var_dump($last_eval_key);//NULL

$last_eval_key = $last_eval_key ?? [];
var_dump($last_eval_key); // array(0){}
