<?php

$ret = 1;
// $ret = 2;
// $ret = 3;
// $ret = 0;

switch ($ret) {
    case 1:
    case 2:
    case 3:
        # code...
        echo $ret;
        break;
    case 3:
            break;
    
    default:
        # code...
        echo 0;
        break;
}