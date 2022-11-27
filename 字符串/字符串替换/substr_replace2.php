<?php
$input = array('A: XXX', 'B: XXX', 'C: XXX');

// 简单用例：将每个字符串使用 YYY 替换为 XXX。
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n";

// 更复杂的情况，每种替换都不同。
$replace = array('AAA', 'BBB', 'CCC');
echo implode('; ', substr_replace($input, $replace, 3, 3))."\n";

// 每次替换的字符数不同。
$length = array(1, 2, 3);
echo implode('; ', substr_replace($input, $replace, 3, $length))."\n";

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串替换/substr_replace2.php
// A: YYY; B: YYY; C: YYY
// A: AAA; B: BBB; C: CCC
// A: AAAXX; B: BBBX; C: CCC
// ➜  learning_of_php git:(master) ✗ 