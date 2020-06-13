<?php

$res = [
	'status' => 1, 
	'msg' => 'success', 
	'data' => [
		'id' => 1,
		'name' => 'williamning',
		'age' => 27
	]
];
// sleep(2); //程序休眠2秒. 使得ajax请求超时
echo json_encode($res); //所以,最终的结果还是打印的方式输出