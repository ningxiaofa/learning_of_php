<?php

// 测试implode()
$ids = [
    'LvZpuwH28Pz4ifE4',
    'LvZpuwH28Pz4ifE4',
    'LvZpuwH28Pz4ifE4',
];

echo implode(":", $ids);
// ouput:
// LvZpuwH28Pz4ifE4:LvZpuwH28Pz4ifE4:LvZpuwH28Pz4ifE4

$json = '
{
    "query":{
        "bool":{
            "must":[
                {
                    "match":{
                        "nid":"sig_osvo0aqoiekmm6k1uc04bikm83"
                    }
                },
                {
                    "match":{
                        "roles":"100"
                    }
                }
            ],
            "must_not":[
                {
                    "match":{
                        "is_blocked":"1"
                    }
                }
            ]
        }
    },
    "sort":[
        {
            "create.keyword":{
                "order":"asc"
            }
        }
    ]
}';

var_export(json_decode($json, true));
// output -- 可以直接在php代码中使用
//   array (
//     'query' =>
//     array (
//       'bool' =>
//       array (
//         'must' =>
//         array (
//           0 =>
//           array (
//             'match' =>
//             array (
//               'nid' => 'sig_osvo0aqoiekmm6k1uc04bikm83',
//             ),
//           ),
//           1 =>
//           array (
//             'match' =>
//             array (
//               'roles' => '100',
//             ),
//           ),
//         ),
//         'must_not' =>
//         array (
//           0 =>
//           array (
//             'match' =>
//             array (
//               'is_blocked' => '1',
//             ),
//           ),
//         ),
//       ),
//     ),
//     'sort' =>
//     array (
//       0 =>
//       array (
//         'create.keyword' =>
//         array (
//           'order' => 'asc',
//         ),
//       ),
//     ),
// );
