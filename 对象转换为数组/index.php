<?php
date_default_timezone_set('Asia/Shanghai');

$a = '123';
$arr = (array)$a;
var_dump($arr);

echo "<hr>";

class Obj 
{
	//只有非静态属性'才会转换成数组元素
	public $name = 'william';
	public $sex = '男';
	protected $age = 26;
	private $info = 'personal info';
	
	static public $test = 'static attribute'; //也不会转换成数组元素
	
	public function getName()
	{
		return $this->name;
	}
	
	
}
// php 中这种方式不合法
// $obj = {
	// name: 'william',
	// age: 26
// };

$obj = new Obj();
$objToArr = (array)$obj;
var_dump($objToArr);
echo "<hr>";

$obj = (object)['code' => '1234356'];
echo  $obj->code;
echo "<br>";
var_dump($obj);











