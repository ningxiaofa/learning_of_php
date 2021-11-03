<?php

$urlEncodeStr = 'https%3A%2F%2Fwww.notion.so%2Foauth2callback%3Fstate%3DeyJjYWxsYmFja1R5cGUiOiJyZWRpcmVjdCIsImVuY3J5cHRlZFRva2VuIjoiOWI2MjkxOGQzZTU1MzEzZDBiOTMyNzgwYmRiZWVlMTIyOGU1NTc1Yzk3MTVkMDE5Y2ZiN2FjOWFhODlmMjVjNzBmMmRhNjM3MmQ2ZDI4ZDhjZDQxZjg3NGVkZTRiYTg2ZDFhZTQ5MzhiYjQ1ZWU4ZTY0YjMyZTRhYzI3MjYzNzdhNjlhMWE3ZTM4NGNhODk1MjA0ZDg4N2EwNzdjIn0%3D%26code%3D4%2F0AX4XfWiwbgk-2AOMoLqb4hnctB7Y3D8dmkYx4_fv-mHYFQna5nZYu8eZoV3aTuQkw_3TxA%26scope%3Demail%20profile%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email%20openid%26authuser%3D0%26hd%3Dkumu.ph%26prompt%3Dnone';

$urlDecodeStr = urldecode($urlEncodeStr);
// var_dump($urlDecodeStr);
// Output:
// string(551) "https://www.notion.so/oauth2callback?state=eyJjYWxsYmFja1R5cGUiOiJyZWRpcmVjdCIsImVuY3J5cHRlZFRva2VuIjoiOWI2MjkxOGQzZTU1MzEzZDBiOTMyNzgwYmRiZWVlMTIyOGU1NTc1Yzk3MTVkMDE5Y2ZiN2FjOWFhODlmMjVjNzBmMmRhNjM3MmQ2ZDI4ZDhjZDQxZjg3NGVkZTRiYTg2ZDFhZTQ5MzhiYjQ1ZWU4ZTY0YjMyZTRhYzI3MjYzNzdhNjlhMWE3ZTM4NGNhODk1MjA0ZDg4N2EwNzdjIn0=&code=4/0AX4XfWiwbgk-2AOMoLqb4hnctB7Y3D8dmkYx4_fv-mHYFQna5nZYu8eZoV3aTuQkw_3TxA&scope=email profile https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email openid&authuser=0&hd=kumu.ph&prompt=none"

$justTest = 'HELLO WILLIAM, 我是宁威廉';

$encodeStr = urlencode($justTest);
var_dump($encodeStr) . PHP_EOL;
// string(62)
// "HELLO+WILLIAM%2C+%E6%88%91%E6%98%AF%E5%AE%81%E5%A8%81%E5%BB%89"

$decodeStr = urldecode($encodeStr);
var_dump($decodeStr) . PHP_EOL;
// string(30)
// "HELLO WILLIAM, 我是宁威廉"
