<?php

// https://www.php.net/manual/zh/function.pack.php
// 还是没看懂「TBD」

class int_helper
{
    public static function int8($i)
    {
        return is_int($i) ? pack("c", $i) : unpack("c", $i)[1];
    }

    public static function uInt8($i)
    {
        return is_int($i) ? pack("C", $i) : unpack("C", $i)[1];
    }

    public static function int16($i)
    {
        return is_int($i) ? pack("s", $i) : unpack("s", $i)[1];
    }

    public static function uInt16($i, $endianness = false)
    {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("n", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("v", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("S", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public static function int32($i)
    {
        return is_int($i) ? pack("l", $i) : unpack("l", $i)[1];
    }

    public static function uInt32($i, $endianness = false)
    {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("N", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("V", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("L", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public static function int64($i)
    {
        return is_int($i) ? pack("q", $i) : unpack("q", $i)[1];
    }

    public static function uInt64($i, $endianness = false)
    {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("J", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("P", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("Q", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }
}

Header("Content-Type: text/plain");

echo int_helper::uInt8(0x6b) . PHP_EOL;  // k
echo int_helper::uInt8(107) . PHP_EOL;  // k
echo int_helper::uInt8("\x6b") . PHP_EOL . PHP_EOL;  // 107

echo int_helper::uInt16(4101) . PHP_EOL;  // \x05\x10
echo int_helper::uInt16("\x05\x10") . PHP_EOL;  // 4101
echo int_helper::uInt16("\x05\x10", true) . PHP_EOL . PHP_EOL;  // 1296

echo int_helper::uInt32(2147483647) . PHP_EOL;  // \xff\xff\xff\x7f
echo int_helper::uInt32("\xff\xff\xff\x7f") . PHP_EOL . PHP_EOL;  // 2147483647

// Note: Test this with 64-bit build of PHP
echo int_helper::uInt64(9223372036854775807) . PHP_EOL;  // \xff\xff\xff\xff\xff\xff\xff\x7f
echo int_helper::uInt64("\xff\xff\xff\xff\xff\xff\xff\x7f") . PHP_EOL . PHP_EOL;  // 9223372036854775807


// 可以看到，在vscode中终端下输出的二进制内容，出现了乱码「mac自带的终端也是如此」
// ➜  learning_of_php git:(master) ✗ php 网络相关/数据包/pack_unpack.php
// k
// k
// 107


// 4101
// 1296

// ���
// 2147483647

// �������
// 9223372036854775807

// ➜  learning_of_php git:(master) ✗ 