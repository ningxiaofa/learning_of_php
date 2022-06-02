<?php

$dbms = 'mysql';     //数据库类型
$host = 'localhost'; //数据库主机名
$dbName = 'learning';//使用的数据库
$user = 'root';      //数据库连接用户名
$pass = 'Nxf=1104';          //对应的密码
$dsn = "$dbms:host=$host;dbname=$dbName";


try {
    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    /*你还可以进行一次搜索操作
    foreach ($dbh->query('SELECT * from FOO') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    */
    $dbh = null;
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}

//默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
// $db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));


// 如果出现如下报错
// ➜  learning_of_php git:(master) ✗ /usr/local/opt/php@7.2/bin/php 服务检查/pdo.php
// Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port) :-(
// Error!: SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client<br/>%                                                                     
// ➜  learning_of_php git:(master) ✗ 

// 解决办法链接
// https://stackoverflow.com/questions/52364415/php-with-mysql-8-0-error-the-server-requested-authentication-method-unknown-to

// 简单说
// 原因是mysql8.x默认采用的认证方式不是密码认证，需要改为密码认证方式
// 修改方式有两种
// 方式一：直接命令修改
// ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password
// BY 'password'; -- 这里的password是你想要设置的密码，比如Xxx=2022

// 方式二：
// 修改 my.cnf 配置文件
// [mysqld]
// default_authentication_plugin=mysql_native_password
// 然后执行权限刷新命令 -- 说明mysql目前似乎并不支持自动加载配置文件功能[热重启/优雅重启功能]
// FLUSH PRIVILEGES;

// 正常输出结果：
// ➜  learning_of_php git:(master) ✗ /usr/local/opt/php@7.2/bin/php 服务检查/pdo.php
// Xdebug: [Step Debug] Could not connect to debugging client. Tried: localhost:9003 (through xdebug.client_host/xdebug.client_port) :-(
// 连接成功<br/>% 
// ➜  learning_of_php git:(master) ✗ 