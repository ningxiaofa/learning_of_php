<?php

try {
    throw new Exception('just test');
} catch (\Throwable $th) {
    //throw $th;
    $msg = $th->getMessage();
    var_dump($msg);
}