<?php

// 获取格式如下：
// http://localhost:9000/Route1.php?route=/users/william
function getQueryStringArr()
{
    // ------------------------------- Get query_string value - Start
    $queryString = $_SERVER['QUERY_STRING'];

    // First split
    $realQueryString = explode('?', $queryString);
    // var_dump($realQueryString); // array(2) { [0]=> string(10) "index/list" [1]=> string(16) "type=1&name=ning" }

    // Second split
    $params = explode('&', $realQueryString[0]);
    // var_dump($params); // array(2) { [0]=> string(6) "type=1" [1]=> string(9) "name=ning" }

    // Third split, and make up associate array
    $paramArr = [];
    foreach ($params as $value) {
        $tmp = explode('=', $value);
        $paramArr[$tmp[0]] = $tmp[1];
    }

    // var_dump($paramArr); // array(2) { ["type"]=> string(1) "1" ["name"]=> string(4) "ning" }

    return $paramArr;
    // ------------------------------- Get query_string value - End
}

// 获取格式如下：[有两个问号时, 总之灵活使用即可]
// // http://localhost:8100/index.php?index/list?type=1&name=ning
function getQueryStringArr1()
{
    $queryString = $_SERVER['QUERY_STRING'];

    // First split
    $realQueryString = explode('?', $queryString);
    // var_dump($realQueryString); // array(2) { [0]=> string(10) "index/list" [1]=> string(16) "type=1&name=ning" }

    // Second split
    $params = explode('&', $realQueryString[1]);
    // var_dump($params); // array(2) { [0]=> string(6) "type=1" [1]=> string(9) "name=ning" }

    // Third split, and make up associate array
    $paramArr = [];
    foreach ($params as $value) {
        $tmp = explode('=', $value);
        $paramArr[$tmp[0]] = $tmp[1];
    }

    // var_dump($paramArr); // array(2) { ["type"]=> string(1) "1" ["name"]=> string(4) "ning" }
    return $paramArr;
    // ------------------------------- Get query_string value - End
}

return getQueryStringArr();
