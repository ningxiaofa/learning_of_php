<?php

// 已知1970年1月1日是星期四，求2017年3月21日是星期几，
// 并按‘2017-03-21 星期二’的格式输出，输出结果如图所示 :

echo '2017年3月21日是';

// header("Content-type: text/html; charset=utf-8");
//获取星期方法
function get_week($date)
{
    //强制转换日期格式
    $date_str = date('Y-m-d', strtotime($date));
    var_dump(strtotime($date));
    //封装成数组
    $arr = explode("-", $date_str);
    
    //参数赋值
    //年
    $year = $arr[0];
    //月，输出2位整型，不够2位右对齐
    $month = sprintf('%02d', $arr[1]);
    //日，输出2位整型，不够2位右对齐
    $day = sprintf('%02d', $arr[2]);
    //时分秒默认赋值为0；
    $hour = $minute = $second = 0;
    //转换成时间戳
    $strap = mktime($hour, $minute, $second, $month, $day, $year);
    //获取数字型星期几
    $number_wk = date("w", $strap);
    //自定义星期数组
    $weekArr = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
    //获取数字对应的星期
    return $weekArr[$number_wk];
}
// 测试
$date = "2017-03-21";
echo get_week($date) . PHP_EOL;
// 星期二

// -------------------------------------------------------------
// 简化后的函数
function getWeek($datetime)
{
    $number = date('w', strtotime($datetime));
    $weeks = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
    return $weeks[$number];
}

print getWeek('2017-3-21') . PHP_EOL;
print getWeek('2017-03-21') . PHP_EOL;