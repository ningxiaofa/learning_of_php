<?php

namespace app\commands\utils;

class CommonHelper
{
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
}

// Example:
list($initMem, $initTime) = CommonHelper::getMemUsed();
var_dump($initMem, $initTime);
list($costMem, $costTime) = CommonHelper::getMemUsed($initMem, 'MB', $initTime);
var_dump($costMem, $costTime);
exit;