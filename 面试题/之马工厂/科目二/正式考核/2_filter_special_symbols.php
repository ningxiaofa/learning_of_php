<?php

// 编写过滤函数
//1）将HTML标签去掉 
//2）去掉头尾和中间的空格 
//3）去掉一些特殊字符，如小括号()、分号;、百分号%、单引号。
function filter($searchWord)
{
    $find = [
        ' ',
        '(',
        ')',
        ';',
        '%',
        '\'',
    ];
    $replace = '';
    $ret = '';

    // 先去除html标签
    $searchWord = strip_tags($searchWord); // query('Hello %World%')
    // 方式一: 推荐
    // for ($i=0; $i < strlen($searchWord); $i++) { 
    //     $value = $searchWord[$i];
    //     if(in_array($value, $specialSymbols)){
    //         continue;
    //     }
    //     $ret .= $value;
    // }

    // 方式二: 推荐「跟方式一实现思路应是相同」
    $ret = str_replace($find, $replace, $searchWord);

    // 方式三：一般推荐
    // $regex = "/\/|\～|\，|\。|\！|\？|\“|\”|\【|\】|\『|\』|\：|\；|\《|\》|\’|\‘|\ |\·|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
    // $regex = "/\s|\(|\)|%|;|'/"; // \s: 空格，\(: 左小括号(, \): 右小括号)，%: 百分号，;: 分号，': 单引号
    // $ret = preg_replace($regex, "", $searchWord);

    // 方式四：非常不推荐
    // $ret = str_replace(' ', $replace, $searchWord);
    // $ret = str_replace("(", $replace, $ret);
    // $ret = str_replace(")", $replace, $ret);
    // $ret = str_replace(";", $replace, $ret);
    // $ret = str_replace("%", $replace, $ret);
    // $ret = str_replace("'", $replace, $ret);

    return $ret;
}

$searchWord = "<data>query('Hello %World%');</data>";
$searchWord_safe = filter($searchWord);
echo '过滤后的搜索字符串为：' . $searchWord_safe;

echo PHP_EOL;
if ($searchWord_safe === 'queryHelloWorld') {
    exit("Yep, you are right");
}
exit('Nope, you are wrong');
