<?php

$sig_blocked = [];
$ret = array_column($sig_blocked, 'nid');
var_export($ret);

// Output --- 并不会报错
// array (
// )

unset($sig_blocked[-1]);
echo "hello";
