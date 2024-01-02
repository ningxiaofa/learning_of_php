<?php
class MersenneTwister {
    private const N = 624;
    private const M = 397;
    private const MATRIX_A = 0x9908b0df;
    private const UPPER_MASK = 0x80000000;
    private const LOWER_MASK = 0x7fffffff;

    private $mt;
    private $index;

    public function __construct(int $seed) {
        $this->mt = array_fill(0, self::N, 0);
        $this->index = self::N;

        $this->mt[0] = $seed & 0xffffffff;

        for ($i = 1; $i < self::N; $i++) {
            $this->mt[$i] = (1812433253 * ($this->mt[$i - 1] ^ ($this->mt[$i - 1] >> 30)) + $i) & 0xffffffff;
        }
    }

    private function generateNumbers() {
        for ($i = 0; $i < self::N; $i++) {
            $y = ($this->mt[$i] & self::UPPER_MASK) | ($this->mt[($i + 1) % self::N] & self::LOWER_MASK);
            $this->mt[$i] = $this->mt[($i + self::M) % self::N] ^ ($y >> 1);

            if ($y % 2 !== 0) {
                $this->mt[$i] ^= self::MATRIX_A;
            }
        }
    }

    public function extractNumber() {
        if ($this->index >= self::N) {
            $this->generateNumbers();
            $this->index = 0;
        }

        $y = $this->mt[$this->index++];

        $y ^= ($y >> 11);
        $y ^= ($y << 7) & 0x9d2c5680;
        $y ^= ($y << 15) & 0xefc60000;
        $y ^= ($y >> 18);

        return $y & 0xffffffff;
    }
}

$seed = 12345; // 初始种子
$generator = new MersenneTwister($seed);

$seeds = array(); // 存储生成的随机种子

// 生成x个随机种子
for ($i = 0; $i < 5; $i++) {
    $random_seed = $generator->extractNumber();
    $seeds[] = $random_seed;
}

// 打印生成的随机种子
foreach ($seeds as $index => $random_seed) {
    echo "Seed " . ($index + 1) . ": " . $random_seed . "\n";
}