<?php

// https://www.php.net/manual/zh/function.substr-replace.php

$var = 'ABCDEFGH:/MNRPQR/';
echo "Original: $var<hr />\n";

/* 这两个例子使用 “bob” 替换整个 $var。*/
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

/* 将 “bob” 插入到 $var 的开头处。*/
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

/* 下面两个例子使用 “bob” 替换 $var 中的 “MNRPQR”。*/
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

/* 从 $var 中删除 “MNRPQR”。*/
echo substr_replace($var, '', 10, -1) . "<br />\n";

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串替换/substr_replace.php
// Original: ABCDEFGH:/MNRPQR/<hr />
// bob<br />
// bob<br />
// bobABCDEFGH:/MNRPQR/<br />
// ABCDEFGH:/bob/<br />
// ABCDEFGH:/bob/<br />
// ABCDEFGH://<br />
