<?php

$invoice_amount = 0.58;

$ret = intval($invoice_amount*100);
var_dump($ret);

$remainder = intval(bcmul($invoice_amount, 100));
var_dump($remainder);

// output
// int(57)
// int(58)

// 可以知道，关于浮点数的计算，要使用编程语言提供的专门的函数库来解决
// 或者 自己先将浮点数转换为整数，然后进行计算，最后再变成浮点数
// 参见 ./self_solve.php