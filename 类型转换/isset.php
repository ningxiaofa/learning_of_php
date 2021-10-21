<?php

$ret = ['is_sig' => 2];

// 用于条件判断中
var_dump($ret['is_sig'] ?? false);
var_dump($ret['is_sig1'] ?? true);
