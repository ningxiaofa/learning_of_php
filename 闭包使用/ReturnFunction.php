<?php

class ReturnClass
{
	//如果没有构造函数,则使用跟类名相同的方法,会被认为是构造函数[构造函数不能为静态方法
	//[这里不区分大小写, 因为是Windows系统缘故]的方法] 可以是受保护的.
	public function __construct()
	{
		echo '__construct';
	}
	
	static public function returnClass()
	{
		// exit('stop');
		//返回的是闭包，可以继续调用
		return function($table){
			// $table->tinyInteger('advertisement_status_code'); //使用这种方式,编写微服务 返回数据表字段
			return [$table];
		};
	}
}

// $obj = new ReturnClass();
// var_dump($obj);
// 输出结果
// __construct
// object(ReturnClass)#1 (0) {
// }
// 实践可知：并不会执行returnClass方法

$obj = ReturnClass::returnClass();
var_dump($obj);
// 输出
// object(Closure)#1 (1) {
//   ["parameter"]=>
//   array(1) {
//     ["$table"]=>
//     string(10) "<required>"
//   }
// }
var_dump($obj('123')); //可以继续调用
// 输出
// array(1) {
//   [0]=>
//   string(3) "123"
// }