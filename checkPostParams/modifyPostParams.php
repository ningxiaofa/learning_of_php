<?php
var_dump($_GET);
echo "</br>";
$param = $_POST;
highlight_string("<?php\n\$param =\n" . var_export($param, true) . ";\n?>"); //打印
