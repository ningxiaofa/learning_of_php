<?php 

header('Content-type:text/html; charset=utf-8');

// 注销后的操作
session_start();

// 清除Session
$username = $_SESSION['username'] ?? null;  //用于后面的提示信息
// 如果已经退出，直接跳转到登录页面
if(is_null($username)){
    header('location:login.html');
}
$_SESSION = array();
session_destroy();

// 清除Cookie
setcookie('username', '', time()-99);
setcookie('code', '', time()-99);

// 提示信息
echo "欢迎下次光临, ".$username.'<br>';
echo "<a href='login.html'>重新登录</a>";
