<?php

$arr = ['name'=>'william'];

// try{
//     echo $arr['name'];
// }catch(Exception $e){
//     echo 123;
// }

// 输出结果:
//  直接报错错误：Notice: Undefined index: name in D:\wamp\php-7.4.3-Win32-vc15-x64\public\php-learning\异常处理\try_catch.php on line 6
// 并不会输出 123

// 修改如下：
try{
	if(!isset($arr['name1'])){
		throw new Exception('Undefined index...'); //如果不传递 参数[message],getMessage()输出是空
	}
    echo 'try...';
}catch(Exception $e){
	echo $e->getMessage(); // Undefined index...
    echo 'catch...';
}

// 输出结果:
// Undefined index...catch...

// 学习与总结
// 1. 首先try代码块中必须要有throw语句, 不论是直接写在try中, 还是通过调用函数, 类方法等中有throw.
// 2. try...catch 并不是任何时候都要使用的, 只是针对代码无法完全控制[注意这只是一个表达, 世界上并不存在完全可控的事情]时, 采用补救/预防措施, 如:
//  2.1 连接数据库, 远程 API调用, 就不是一个可控[可能是数据库服务异常, 或者网络超时等]的事情, 需要放在try...catch中处理, 同时, 连接数据库一般使用的是PDO扩展, 编写该扩展的开发者, 已经考虑到失败时, 抛出异常. 所以不要我们再次手动抛出异常, 而且有时候, 利用框架开发, 框架本身也已经做了很多工作.我们要做的就是多阅读框架文档, 使用推荐的方式进行开发.
// 至于接数据库进行数据操作[CURD], 这个过程也可能失败, 异常, 有时候则需要我们自己去处理,有时候则不需要, 要视扩展, 框架做了多少, 从而确定你需要做多少.
//  2.2 但是如果自己写的服务/扩展等, 异常处理则需要我们自己去做, 同时像获取某个变量值这样的操作, 是不需要放在try...catch中的, 因为这样的情况可认为是开发者完全可控的, 如果出现报错[比如变量不存在], 也是因为编写代码存在bug, 修改bug就好, 而且争取不要再出现这样低级错误.
// 又如, 像配置参数, 如果是我们自己添加的, 并且只有自己使用, 就不必使用抛出异常, 因为代码比较可控, 但是如果是写扩展/服务给他人使用, 配置参数很重要, 就要做在读取不到参数时, 抛出异常. 处理交给使用者去做. 如果使用者没有处理, 就会程序报错, 然后停止程序执行, 如果做了处理, 则代表使用者已经知晓存在的问题.

// 总结起来:
// 异常进可攻退可守，我们需要使用 try catch 代码块预测第三方代码可能抛出的异常；我们还可以主动出击，抛出异常，
// 把我们不知道怎么处理的特定情况交给上层开发者来处理。 这是站在两个角度进行的.前者是调用别人的代码[主动抛出异常], 后者是别人调用我们的代码[try..catch捕获异常处理],如: PHP 组件和框架的作者尤其无法确定如何处理异常情况，因此会选择抛出异常，把异常委托给使用者去处理.


// PHP 框架中开启事务 的推荐写法
// Start the transactions
	 // *     $db->begin();
	 // *
	 // *     try {
	 // *          DB::insert('users')->values($user1)...
	 // *          DB::insert('users')->values($user2)...
	 // *          // Insert successful commit the changes
	 // *          $db->commit();
	 // *     }
	 // *     catch (Database_Exception $e)
	 // *     {
	 // *          // Insert failed. Rolling back changes...
	 // *          $db->rollback();
	 // *      }
	 // *

/* 
INSERT INTO `customer_order_reload_history` (`customer_id`, `sales_order_id`, `pricebook_package_id`, `quantity`, `expire_date`, `created_datetime`) VALUES (334203, 0, 22060, 1, ‘2020-08-13’, ‘2020-08-12 11:59:01.620’);
INSERT INTO `customer_order_reload_history` (`customer_id`, `sales_order_id`, `pricebook_package_id`, `quantity`, `expire_date`, `created_datetime`) VALUES (334203, 0, 22060, 1, ‘2020-08-13’, ‘2020-08-12 11:59:01.744’);
*/