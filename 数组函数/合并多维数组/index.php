<?php

$arr = [
    0 => [ 
    	"DAU" => [1111, 22222], 
    	"MAU" => [1111, 22222, 33333],
    	"MAU0-1" => [1111, 22222, 33333]
    ],
    1 => [
    	"DAU" => [22222, 3333], 
    	"MAU" => [1111, 22222, 44444],
    ]
];

// Target:
// $arr2 = [
//    "DAU" => [1111, 22222, 3333],
//    "MAU" => [1111, 22222, 33333, 44444],
// ];

function serializeProcess($arr){
	$arrRet = [];
	$arrKeyRet = [];

	array_map(function($v) use (&$arrKeyRet) {
		array_map(function($subV) use (&$arrKeyRet) {
			in_array($subV, $arrKeyRet) ? null : array_push($arrKeyRet, $subV);
		}, array_keys($v));
	}, $arr);


	function getColumnData($arr, $key){
		return array_column($arr, $key);
	}

	function dataMerge($arr, $key){
		$tmp = [];

		foreach ($arr as $value){
			foreach ($value as $subValue){
				$tmp[$key][] = $subValue;
			}
			$tmp[$key] = array_unique($tmp[$key]);
		}

		return $tmp;
	}

	foreach ($arrKeyRet as $value){
		$arrRet = array_merge($arrRet, dataMerge(getColumnData($arr, $value), $value));
	}

	return $arrRet;
}

var_export(serializeProcess($arr));
