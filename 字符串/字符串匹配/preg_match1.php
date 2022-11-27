<?php
//模式分隔符后的"i"标记这是一个大小写不敏感的搜索
if (preg_match("/php/i", "PHP is the web scripting language of choice.")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}

// ➜  learning_of_php git:(master) ✗ php 字符串/字符串匹配/preg_match1.php
// A match was found.
// ➜  learning_of_php git:(master) ✗ 