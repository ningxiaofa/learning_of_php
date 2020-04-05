<?php

// $session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

// $uuid = $session->generateUuid();

// var_dump($uuid);

//方式一
if (!function_exists('guid')) {
	function guid(){
        $uuid = '';
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            //$uuid = //chr(123)// "{"
            $uuid .= substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
            //.chr(125);// "}"
            return $uuid;
        }
    }
}

echo guid();
echo "<hr>";

//方式二
if(!function_exists('gen_uuid')){
	function gen_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// 32 bits for "time_low"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

			// 16 bits for "time_mid"
			mt_rand( 0, 0xffff ),

			// 16 bits for "time_hi_and_version",
			// four most significant bits holds version number 4
			mt_rand( 0, 0x0fff ) | 0x4000,

			// 16 bits, 8 bits for "clk_seq_hi_res",
			// 8 bits for "clk_seq_low",
			// two most significant bits holds zero and one for variant DCE1.1
			mt_rand( 0, 0x3fff ) | 0x8000,

			// 48 bits for "node"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
}

echo strtoupper(gen_uuid());
echo "<hr>";

echo  "推荐查看 <a target='blank' href='https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid'>https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid</a> ";