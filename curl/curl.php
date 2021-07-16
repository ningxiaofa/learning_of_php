<?php

// 出现报错
// Warning: file_get_contents(): Unable to find the wrapper "https" 
//- did you forget to enable it when you configured PHP? in D:\php\php-7.4.3-Win32-vc15-x64\public\curl.php on line 3
// Warning: file_get_contents(https://git.oschina.net/yunluo/API/raw/master/notice.txt): 
//failed to open stream: No such file or directory in D:\php\php-7.4.3-Win32-vc15-x64\public\curl.php on line 3
// echo file_get_contents( "http://git.oschina.net/yunluo/API/raw/master/notice.txt" ); 


//echo file_get_contents( "http://ningxiaofa.top/index.php" );  // 必须带上http [个人博客, 并没有使用https] 直接显示的是ningxiaofa.top/blog的首页, 但是url并没有变
//exit;

/** 
检测 curl扩展是否打开,  避免报错.
因为curl是php的扩展，有的主机为了安全会禁用curl的，
另外php本地调试的时候也是关闭curl的，所以会发生报错.
 */
if(!function_exists('curl_init')){
	die('please open curl extension of php first.');
} else {
	echo '已经加载php curl 扩展.';
}


$url = 'http://news.sohu.com/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据不直接输出
curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //指定gzip压缩 [如果省略, 则会出现乱码]
$content = curl_exec($ch); //执行并存储结果
curl_close($ch);
echo $content;
