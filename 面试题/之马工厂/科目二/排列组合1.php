<?php

/*分治法 —— 直接选择
比如说a b c
首先将a之后的字符依次与a进行交换
1 b,a,c
2 c,b,a

注意这里少了一个原始数据 a,b,c。需要把原始数据也算如排列中
3 a,b,c

然后把字符移到第二个位置，将第二个位置之后的数分别与第二个位置的数进行交换
1 b,a,c ===> 11 b,c,a
2 c,b,a ===> 21 c,a,b
3 a,b,c ===> 31 a,c,b

**/
function zuhe($arr, $begin)
{
    if (!is_array($arr)) return;
    $N = count($arr);
    if ($begin == $N - 1 || $begin > $N || $begin < 0) return;
    if ($begin == 0) {
        print_r($arr); //输出原始数据
        echo '</br>';
    }

    //循环将初始值与第i个值交换后进行组合
    for ($i = $begin; $i < $N; $i++) {
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;

        if ($i !== $begin) { //i==begin时的数已经输出过
            print_r($arr);
            echo '</br>';
        }

        zuhe($arr, $begin + 1);
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
    }
}

$arr = array('a', 'b', 'c', 'd');
// zuhe($arr, 0);

/*分治法——直接插入
初始时从0个元素开始，输出初始序列，为组合的一个序列
当在来一个元素时只需将该元素放在该元素之前的元素组的不同的位置即组成了不同的排列
如已有元素组为a,b.新元素为c,把c分别与a,b进行交换即可(a,c,b);(c,b,a)，在现有的排列上在新增元素
重复执行以上步骤
*/
function zuhe2($arr, $begin)
{
    if ($begin == 0) {
        print_r($arr);
        echo "</br>";
        // zuhe2($arr, $begin+1);
    }

    if ($begin >= count($arr)) return;

    zuhe2($arr, $begin + 1); //begin时的排列上一次已产生，直接新增元素
    for ($i = $begin - 1; $i >= 0; $i--) {
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
        print_r($arr);
        echo "</br>";
        zuhe2($arr, $begin + 1);
        $t = $arr[$begin];
        $arr[$begin] = $arr[$i];
        $arr[$i] = $t;
    }
}
