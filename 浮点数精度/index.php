<?php

$invoice_amount = 0.58;

$ret = intval($invoice_amount*100);
var_dump($ret);

$remainder = intval(bcmul($invoice_amount, 100));
var_dump($remainder);

// output
// int(57)
// int(58)