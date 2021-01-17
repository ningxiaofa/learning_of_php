<?php

class Model extends PDO 
{
    public function __construct()
    {
        $dbms = 'mysql';    //数据库类型
        $host = 'localhost';  //数据库主机名
        $port = 33061; // 连接容器中的MySQL服务器, 但在 7.4下, 一直失败~~
        $dbName = 'test';     //使用的数据库
        $username = 'root';   //数据库连接用户名
        $passwd = 'Wn=2021.'; //对应的密码
        $dsn = "$dbms:host=$host;port=$port;dbname=$dbName";
		
        try{
            parent::__construct($dsn, $username, $passwd);
            echo 'Success connected!';
        }catch(PDOException $exception){
           var_dump($exception->getMessage());
        }
    }
}

$model = new Model;
// $sql = "SELECT * FROM test";
// foreach ($model->query($sql) as $row) {
// 	print $row['id'] . "\t";
// 	print $row['title'] . "\t";
// 	print $row['author'] . "\n";
// }

//输出结果：//数据表的数据只有： 1 test William
//1 test William