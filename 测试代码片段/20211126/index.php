<?php

$user_roles = 160;
$moderator_arr = [160, 170];
// $ret = in_array($user_roles, $moderator_arr) ? 2 : 3;
// var_dump($ret);

$is_req_moderator = false;
$is_req_moderator = true;

$ret = !$is_req_moderator && 3 || in_array($user_roles, $moderator_arr) ? 3 : 2;
var_dump($ret);

$arr = [1, 2, 3];
var_dump($arr);
unset($arr[count($arr) - 1]);
var_dump($arr);
$arr[] = 4;
var_dump($arr);

