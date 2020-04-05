<?php

class Test
{
	public $data = [];
	
	public function setData($data)
	{
		$this->data = $data;
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function index()
	{
		$this->data = ['status' => 1, 'msg' => 'test info'];
		// var_dump($this->data);
		return json_encode($this->data); //不论是否json格式
	}
}

// 请记住, php脚本 不是常驻内存, 每个执行流程都是在一个请求和响应中完成， 之后释放.

// echo (new Test)->index();  //只有这样才会在浏览器界面上出现 {"status":1,"msg":"test info"} 以及 F2 -- network  -- response

return (new Test)->index(); // 是不会返回到浏览器界面上的. 所以需要用到 语言[php]自带的打印[也是为了调试]的函数/语句

