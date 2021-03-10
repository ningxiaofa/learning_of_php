<?php

// http://localhost:8888/是否为同步脚本测试/server.php?yep=??
// var_dump($_GET); // array(1) { ["yep"]=> string(2) "??" }
// exit;

// echo json_encode(['status' => 'success', 'msg' => 'server.php']); die(); // 针对返回content-type: application/json

echo date('h:i:s') . "<br />";

//暂停 5 秒
sleep(5);

//重新开始
echo date('h:i:s') . "<br />";

if($_GET['yep']){
    require_once('../文件写入/simple-echo-content-to-file.php');

    echo 'File writing begins...' . "<br />";

    $logPath = 'test-php-script-whether-continue-execute-when-cancle-request-in-client.txt';
    $content = 'hello php';
    write($logPath, $content);
}

// echo ('server.php Execute over!');

exit('Execute over!');
