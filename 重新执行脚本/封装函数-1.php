<?php

class CommonHelper
{
    /**
     * For retry when appear exception ---------------------------------------------- Start
     * @param $args array, $args[0] function called, others are args of the function called
     * @return mixed
     */
    public static function retry(...$args)
    {
        $NUM_OF_ATTEMPTS = 3;
        $attempts = 0;

        do {
            try {
                return self::execFunc($args);
            } catch (Exception $e) {
                $attempts++;
                sleep(1);
                continue;
            }

            break;
        } while ($attempts < $NUM_OF_ATTEMPTS);

        throw new Exception($e->getMessage() . ' args:' . json_encode($args) . "\n\r");
    }

    protected static function execFunc($args)
    {
        $func = $args[0] ?? null;
        if(is_null($func)){
            exit("Error: Args[0]: The function called does not exist, pls check \n\r");
        }

        $agrsCount = count($args);
        if($agrsCount > 6){
            exit("Error: Currently only supported the called function that up to 5 args \n\r");
        }

        switch ($agrsCount) {
            case 1:
                return self::$func();
            case 2:
                return self::$func($args[1]);
            case 3:
                return self::$func($args[1], $args[2]);
            case 4:
                return self::$func($args[1], $args[2], $args[3]);
            case 5:
                return self::$func($args[1], $args[2], $args[3], $args[4]);
            case 6:
                return self::$func($args[1], $args[2], $args[3], $args[4], $args[5]);
        }
    }
    // For retry when appear exception ---------------------------------------------- End

    protected static function outputAndLog($msg = '-------------------', $category = 'db-es-keep-consistency')
    {
        // TBD
        echo $msg;
    }

    /**
     * Get the memory and time costed
     * @param $usedMem int
     * @param $unitMem string, default byte
     * @param $initTime int
     * @param $unitTime string, default second
     * @return array[int] [$costMem, $costTime]
     */
    public static function getMemUsed($usedMem = 0, $unitMem = '', $initTime = 0, $unitTime = '')
    {
        $costMem = $usingMem = memory_get_usage();
        $costTime = $currTime = time();
        
        if($usedMem){
            $costMem = $usingMem - $usedMem;
        }

        if($unitMem == 'MB'){
            $costMem = ($usingMem - $usedMem) / 1024 / 1024;
        }

        if($initTime){
            $costTime = $currTime - $initTime;
        }

        if($unitTime == 'minutes'){
            $costTime = ($currTime - $initTime) / 60;
        }
       
        return [$costMem, $costTime];
    }

    protected static function logicFunc($str1, $str2)
    {
        return $str1 . $str2;
    }
}

// Usage
$ret = CommonHelper::retry('logicFunc', 'hello', 'world');
var_dump($ret);

// php ./重新执行脚本/封装函数-1.php
// string(10) "helloworld"