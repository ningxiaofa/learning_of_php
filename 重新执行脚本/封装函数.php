<?php

// 函数的参数 ¶
// https://www.php.net/manual/zh/functions.arguments.php

function retry(...$args)
{
    // $args = func_get_args(); // 不推荐
    $func = $args[0];
    unset($args[0]);
    
    $NUM_OF_ATTEMPTS = 2;
    $attempts = 0;
    do {
        try {
            return $func($args);
        } catch (Exception $e) {
            echo $e->getMessage();
            $attempts++;
            sleep(1);
            continue; // 直接跳转到while()
        }

        break;

    } while($attempts < $NUM_OF_ATTEMPTS);
}

function execFunc($param1, $param2){
    var_dump($param1, $param2);
    exit;
    return $param1 . $param2;
}

// invoke code
$ret = retry('execFunc', 'william', 'ning');
var_dump($ret);

// Question:
// 如何在类中使用，似乎要借助依赖注入？TBD

