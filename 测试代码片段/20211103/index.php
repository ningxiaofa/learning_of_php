<?php

$lek = 'eyJuaWQiOiJzaWdfa3Q1a2Fza2lyZWVyc21lM3N0M3JhZjFqODYiLCJza2V5IjoiMTAwMTYzMzA3MjExMjc4NzIiLCJwYWdlIjoyLCJzaXplIjoxMH0';

$lek = 'eyJuaWQiOiJzaWdfbWlwaTRjaW9vY2YwbGZxdWU5czB0bzMyZnYiLCJza2V5IjoiMTAwMTYzNTgyNDYwNDk0NTkiLCJwYWdlIjoyLCJzaXplIjoxMH0=';

$lek = 'eyJuaWQiOiJzaWdfbWlwaTRjaW9vY2YwbGZxdWU5czB0bzMyZnYiLCJza2V5IjoiMTAwMTYzMTc5MjEzMDg4OTkiLCJwYWdlIjozLCJzaXplIjoxMH0=';

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

// Store Redis
// key => value type
// 'sig_kt5kaskireersme3st3raf1j86_2_size' => 'eyJuaWQiOiJzaWdfa3Q1a2Fza2lyZWVyc21lM3N0M3JhZjFqODYiLCJza2V5IjoiMTAwMTYzMzA3MjExMjc4NzIiLCJwYWdlIjoyLCJzaXplIjoxMH0'

// 上面三个$lek是不同，
// 不同的地方：nid， page
