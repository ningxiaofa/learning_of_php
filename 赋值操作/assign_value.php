<?php

if($name = false !== is_bool(false) ){ //最后就是一个赋值操作
	//var_dump($name);
}

// echo json_encode($_SERVER);
// echo "<hr>";
// var_dump($_SERVER);
// var_dump($_SERVER['argv']);
highlight_string("<?php\n\$data =\n" . var_export($_SERVER,true) . ";\n?>");
exit;

class Test
{
	public $data;
	
	public function index($name = 'test')
	{
		return $this->data['env'] = $name; //返回的是字符串 string(9) "test name"
	}
}

$test = new Test;
$testArr = $test->index('test name');
var_dump($testArr); //string(9) "test name"