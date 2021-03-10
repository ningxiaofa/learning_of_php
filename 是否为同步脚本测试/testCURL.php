<?php

function testCurl($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据不直接输出
	curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //指定gzip压缩 [如果省略, 则会出现乱码]
	$content = curl_exec($ch); //执行并存储结果
	curl_close($ch);
	return $content;
}
