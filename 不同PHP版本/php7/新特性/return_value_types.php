<?php

function arraysSum(array ...$arrays): array{    
    var_dump($arrays);
    return array_map(function(array $array): int {        
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));

// array(3) {
//     [0]=>
//     array(3) {
//       [0]=>
//       int(1)
//       [1]=>
//       int(2)
//       [2]=>
//       int(3)
//     }
//     [1]=>
//     array(3) {
//       [0]=>
//       int(4)
//       [1]=>
//       int(5)
//       [2]=>
//       int(6)
//     }
//     [2]=>
//     array(3) {
//       [0]=>
//       int(7)
//       [1]=>
//       int(8)
//       [2]=>
//       int(9)
//     }
//   }
//   Array
//   (
//       [0] => 6
//       [1] => 15
//       [2] => 24
//   )