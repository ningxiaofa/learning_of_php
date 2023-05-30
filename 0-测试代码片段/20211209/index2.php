<?php

$sigs = [
    'sig_42fd34fq6mjj3l0e77anok5u3p',
    'sig_lrk35jmb88amoll7meojvctci4',
    'sig_96ft91d0eo70c63vt5rkpi88ap',
    'sig_d1ver2h3kmfeavkm1imcmu1gep',
    'sig_bcnvf9arlnmakd983nmr4tktpn',
    'sig_kia1j2s883nmppbtqpeaq5q30h',
    'sig_7sbutn1bp6su0tjvrnsgjig7u6',
    'sig_i7i85q8bu93amvhr0lcomnh7mp',
    'sig_15cubuohdcpkifk4rakav704cj',
    'sig_e53tadu433akgg1u6jfie4ipk4',
    'sig_da6jlhd7rl2taou0u6j8cf82ln',
    'sig_osvo0aqoiekmm6k1uc04bikm83',
    'sig_va14o4uccupjr15km6s1lu5krg',
    'sig_kdtonfu5omb2g8ql5tuabnuh54',
];

// filter
$ret = [];
foreach($sigs as $v){
    if(in_array($v, $ret)){
        echo $v;
    }else{
        $ret[] = $v;
    }
}
// var_dump($ret);


$arr = [
    'hello' => [
        'hello' => 'hello',
        'hello1' => 'hello'
    ],
    'world' => [
        'world' => 'world',
        'world1' => 'world'
    ]
];

$arr_values = array_values($arr);
var_dump($arr_values);
// array(2) {
//     [0]=>
//     array(2) {
//       ["hello"]=>
//       string(5) "hello"
//       ["hello1"]=>
//       string(5) "hello"
//     }
//     [1]=>
//     array(2) {
//       ["world"]=>
//       string(5) "world"
//       ["world1"]=>
//       string(5) "world"
//     }
//   }