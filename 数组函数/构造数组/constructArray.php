<?php

//目标: 构造一个m列n维数组
//思路:

function constructArray($m, $n)	
{
	$array = [];
	
	for($i = 0; $i < $m; $i++){
		for($j = 0; $j < $n; $j++){
			$element = '';
			$num = rand(1,4);
			for($k = 0; $k < $num; $k++){
				$element .= chr(rand(97, 122));
				//echo $element;
				//echo "<br>";
				//97~122是小写的英文字母
				//65~90是大写的 
			}
			$array[$i][$j] = $element;
		}
	}
	
	return $array;
}

//打印
$dump = function ($var){
	echo '<pre>'; // This is for correct handling of newlines
	ob_start();
	var_dump($var);
	$a=ob_get_contents();
	ob_end_clean();
	echo htmlspecialchars($a,ENT_QUOTES); // Escape every HTML special chars (especially > and < )
	echo '</pre>';
};

$data = constructArray(6, 5);
$dump($data);