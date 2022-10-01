<?php

require_once "Cache.php";

$cache = Cache::factory();
$cache->set('hello', 'world');
    var_dump($cache->data);
$cache->get('hello');
    var_dump($cache->data);
$cache->delete('hello');
    var_dump($cache->data);

    // set...array(1) {
    //     ["hello"]=>
    //     string(5) "world"
    //   }
    //   get...array(1) {
    //     ["hello"]=>
    //     string(5) "world"
    //   }
    //   delete...array(0) {
    //   }