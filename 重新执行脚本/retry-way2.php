<?php

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

set_error_handler("exception_error_handler");

$NUM_OF_ATTEMPTS = 5;
$attempts = 0;

function doSomething($params, $try = 1){
    try{
        //do something
        return true;
    }
    catch(Exception $e){
        if($try <5){
             sleep(10);
             //optionnaly log or send notice mail with $e and $try
             doSomething($params, $try++);
        }
        else{ 
             return false;
        }
    }
}
