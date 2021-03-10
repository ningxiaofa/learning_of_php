<?php

require_once(dirname(__DIR__) . '/curl/cURL-request-motheds.php');
require_once('./testCURL.php');

// 任务一: 请求接口 通过 curl
$url = 'http://news.sohu.com/';
$url = 'baidu.com/';
// $ret = geturl($url); // 因为content-type不是json
// echo $ret;

$content = testCurl($url);

if(!empty($content)){
	// echo $content;
	echo "<hr />";
	echo '正常访问百度';
	echo "<hr />";
	// 任务二: 正常执行脚本
	$i = 1;
	while($i < 100){
		print $i . PHP_EOL;
		$i++;
	}
}

echo "<hr />";
exit('stop');

// 输出结果:
// 已经加载php curl 扩展.
// 正常访问百度
// 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40 41 42 43 44 45 46 47 48 49 50 51 52 53 54 55 56 57 58 59 60 61 62 63 64 65 66 67 68 69 70 71 72 73 74 75 76 77 78 79 80 81 82 83 84 85 86 87 88 89 90 91 92 93 94 95 96 97 98 99
// stop