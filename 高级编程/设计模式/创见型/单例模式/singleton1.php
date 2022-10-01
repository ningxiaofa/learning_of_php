<?php

// 如何确保只制造一个对象
// １：对象的产生，需要new或者clone -- 这是对象产生的两种途径，但是不是实现单例的关键点

// ２：防止产生过多的对象，要防止new和clone／继承
// ３：综上，没有对象时，允许new，并把对象缓存，下次直接返回该对象
final class Singleton
{
    /**
     * @var null
     */
    private static $ins = null;

    // 构造方法私有化，可以防止类外new对象
    private function __construct()
    {
        // code
    }

    // __clone私有化，可以防止类外clone对象
    private function __clone()
    {
        // code 
    }

    /**
     * @return Singleton|null
     */
    public static function getIns()
    {
        if (self::$ins == null) {
            self::$ins = new self();
        }
        return self::$ins;
    }
}

$s1 = Singleton::getIns();
$s2 = Singleton::getIns();

echo $s1 === $s2 ? 'same obj' : 'not same obj';
// same obj