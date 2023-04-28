<?php

function return_void(){
    // nothing to return
}

$ret = return_void();
var_dump($ret);//NULL

if($ret === null){
    exit('yes, it is null');//yes, it is null
}