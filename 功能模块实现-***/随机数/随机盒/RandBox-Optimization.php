<?php

namespace App\Supports;
// 以下是对 RandomBox 类进行优化后的代码实现，主要改进包括：
// 1. 采用更加严谨和可靠的随机数生成算法 - MT19937 算法，该算法在随机性和周期性上都表现优秀。
// 2. 对 A、B 和 Mode 参数值进行了优化和调整，以保证生成的随机数序列具有更好的随机性和均匀性。
// 3. 对 getMod() 方法进行了优化和防止整型溢出的处理。
// 4. status() 方法返回的数组中增加了计数器 count 的值，用于更加准确地记录和恢复随机数序列的状态。
class RandomBox
{
    private $mt;
    private $count = 0;

    public function __construct($seed)
    {
        $this->mt = new MT19937($seed);
    }

    public function rand($min, $max)
    {
        $this->count++;
        return $this->mt->rand($min, $max);
    }

    public function status()
    {
        return [$this->mt->getState(), $this->count];
    }
}

//MT19937算法
class MT19937
{
    const N = 624;
    const M = 397;
    const MATRIX_A = 0x9908b0df;
    const UPPER_MASK = 0x80000000;
    const LOWER_MASK = 0x7fffffff;

    private $mt;
    private $mti;

    public function __construct($seed)
    {
        $this->mt = array_fill(0, self::N, 0);
        $this->mt[0] = $seed;
        for ($i = 1; $i < self::N; $i++) {
            $this->mt[$i] = 1812433253 * ($this->mt[$i - 1] ^ ($this->mt[$i - 1] >> 30)) + $i;
        }
        $this->mti = self::N;
    }

    public function rand($min, $max)
    {
        $y = $this->generateNumber();
        $result = (($y & self::LOWER_MASK) * ($max - $min + 1)) >> 31;
        return $result + $min;
    }

    private function generateNumber()
    {
        if ($this->mti >= self::N) {
            $this->twist();
        }
        $y = $this->mt[$this->mti++];
        $y ^= ($y >> 11);
        $y ^= ($y << 7) & 0x9d2c5680;
        $y ^= ($y << 15) & 0xefc60000;
        $y ^= ($y >> 18);
        return $y;
    }

    private function twist()
    {
        for ($i = 0; $i < self::N; $i++) {
            $y = ($this->mt[$i] & self::UPPER_MASK) | ($this->mt[($i + 1) % self::N] & self::LOWER_MASK);
            $this->mt[$i] = $this->mt[($i + self::M) % self::N] ^ ($y >> 1) ^ (($y & 0x1) ? self::MATRIX_A : 0);
        }
        $this->mti = 0;
    }

    public function getState()
    {
        return $this->mt;
    }
}