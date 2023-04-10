<?php

namespace App\Supports;

//线性同余算法
class RandomBox
{
    const Mode = 391728481;
    const A = 215407343;
    const B = 107571557;
    public $seed;
    public $begin;
    public $count = 0;

    public function __construct($seed)
    {
        $this->seed = $seed;
        $this->begin = $seed;
    }

    static protected function getMod($a,$b,$m)
    {
        $x = 0;
        $f = $b;
        while ($a > 0)
        {
            $c = $a % 2;
            if($c == 1)
            {
                $x += $f;
                $x = $x % $m;
            }
            $a = ($a - $c) / 2;
            $f *= 2;
            $f = $f % $m;
        }
        return $x;
    }

    public function rand($min,$max)
    {
        $this->count ++;
        //$l = $this->seed;
        $this->seed = ($this->getMod(self::A,$this->seed,self::Mode) + self::B) % self::Mode;
        //Log::info("$l,$this->seed");
        $m = $max - $min + 1;
        return $this->seed % $m + $min;
    }

    public function status()
    {
        return [$this->begin,$this->seed];
    }
}
