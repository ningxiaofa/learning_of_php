<?php

$lek = 'eyJuaWQiOiJzaWdfa3Q1a2Fza2lyZWVyc21lM3N0M3JhZjFqODYiLCJza2V5IjoiMTAwMTYzMzA3MjExMjc4NzIiLCJwYWdlIjoyLCJzaXplIjoxMH0';

$last_evaluated = base64_decode($lek);
$last_evaluated = json_decode($last_evaluated, true);
var_dump($last_evaluated);
// Output:
// array(4) {
//     ["nid"]=>
//     string(30) "sig_kt5kaskireersme3st3raf1j86"
//     ["skey"]=>
//     string(17) "10016330721127872"
//     ["page"]=>
//     int(2)
//     ["size"]=>
//     int(10)
//   }
