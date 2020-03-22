<?php

// 在php中有很多字符串函数，例如要先过滤字符串收尾的空格，再求出其长度，一般的写法是：
// strlen(trim($str))
// 如果要实现类似js中的链式操作，比如像下面这样应该怎么写？
// $str->trim()->strlen()

// 方式一
/*class StringHelper 
{
  private $value;
   
  function __construct($value)
  {
    $this->value = $value;
  }
 
  function __call($function, $args){
  	//var_export($function); // trim
  	//var_export($args); // array ( 0 => '0', )
  	//exit;
    $this->value = call_user_func($function, $this->value, $args[0]); //这里参数是根据 要调用函数[闭包]的参数而定 trim('str', '0');
    return $this;
  }
 
  function strlen() {
    return strlen($this->value);
  }
}

$str = " sd f 0";
$str = new StringHelper($str);
// echo "<br>";
// print  "<br>"; 
// print("<br>");
// print "\n";
echo $str->trim('0')->strlen();  //处理字符串两遍0的字符*/



//方式二
// class StringHelper 
// {
//   private $value;
   
//   function __construct($value)
//   {
//     $this->value = $value;
//   }
 
//   function __call($function, $args){
//   	// var_export($args); // array ( 0 => '0', )
//     array_unshift($args, $this->value);
//     // var_export($args); // array ( 0 => ' sd f 0', 1 => '0', )
//     // exit;
//     $this->value = call_user_func_array($function, $args); //依然是按照回调函数的参数顺序而定的, 只不过第二个参数是数组形式
//     return $this;
//   }
 
//   function strlen() {
//     return strlen($this->value);
//   }
// }
 
// $str = new StringHelper(" sd f 0");
// echo $str->trim('0')->strlen();


//方式三
class StringHelper 
{
	private $value;

	function __construct($value)
	{
		$this->value = $value;
	}

	public function trim($t)
	{
		$this->value = trim($this->value, $t);
		return $this;
	}

	function strlen() {
		return strlen($this->value);
	}
}

//方式三 扩展为可以 不分顺序调用
class StringHelper 
{
	private $value;

	public function __construct($value)
	{
		$this->value = $value;
	}

	public function __toString() {
        return (string)$this->value; //必须返回string类型
    }

	public function trim($t)
	{
		$this->value = trim($this->value, $t);
		return $this;
	}

	public function strlen() {
		$this->value = strlen($this->value);
		//echo $this->value; //7
		//exit;
		//var_export($this); //StringHelper::__set_state(array( 'value' => 7, ))
		//exit;
		return $this;
	}
}

$str = " sd f 0";
$str = new StringHelper($str);
echo $str->trim('0')->strlen();  //输出 6
echo "<br>";
echo $str->strlen()->trim('0'); // 输出 1