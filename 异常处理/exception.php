<?php

// 预测、捕获并处理异常是我们自己的责任，未捕获的异常会导致 PHP 应用终止运行，显示致命错误信息，
// 而更糟糕的是，可能会暴露敏感的调试详细信息，让应用的用户看到。
// 因此，一定要捕获异常，然后进行相应的处理。 拦截并处理潜在异常的方式是把可能抛出异常的代码放在 
// try/catch 语句块中，在下面的示例中，使用 PDO 连接数据库失败时会抛出 PDOException 异常，
// catch 块会捕获这个异常，然后显示一个友好的错误提示信息，而不是丑陋的堆栈信息

// if(true){
	// throw new Exception('Something went wrong. Time for lunch!'); //没有捕获, PHP 应用终止运行，显示致命错误信息.界面很丑陋
// }
//下面的代码是不会执行的.
// $code = $exception->getCode();
// $message = $exception->getMessage();
// var_dump($code, $message);

//应该改为下面的代码方式
try{
	throw new Exception('just to test !!');
}catch(Exception $exception){
	$message = $exception->getcode();
	echo $message; //会输出 just to test !!
}