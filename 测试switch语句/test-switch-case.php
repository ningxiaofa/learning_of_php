<?php

$test = 1;
$test = intval($_GET['number']);
// var_dump($test); // 从浏览器中url传输过来的都默认是字符串
// exit; 

switch ($test) {
	case 1:
		# code...
		echo '1';
		break;
	case 2:
		# code...
		echo '2';
		break;
	case 3:
	case 4:
		echo '3/4';
		break;
	default:
		echo 'default';
		# code...
		break;
}