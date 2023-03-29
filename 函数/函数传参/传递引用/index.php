<?php

$mockData = [
    'first' => [
        'second' => [
           'third' => [
                'hello' => 'world',
                'william' => 'ning'
           ]
        ]
    ]
];

function changeQuoteValue(&$resultData){
    // if(!isset($resultData['first'])){
    //     return;
    // }
    // $first = $resultData['first'];

    // if(!isset($first['second'])){
    //     return;
    // }
    // $second = $first['second'];

    // foreach($second as $key => &$value){
    //     $value['extra'] = $key . 'hi';
    // }

    // 上面没有传递引用, 下面是有的，只要记住，涉及到新的变量就不行了

    foreach($resultData['first']['second'] as $key => &$value){
        $value['extra'] = $key . ' hi';
    }
}

changeQuoteValue($mockData);
// var_dump($mockData);
var_export($mockData);
// array (
//     'first' => 
//     array (
//       'second' => 
//       array (
//         'third' => 
//         array (
//           'hello' => 'world',
//           'william' => 'ning',
//           'extra' => 'third hi',
//         ),
//       ),
//     ),
//   )

