<?php

// https://www.php.net/manual/zh/language.oop5.late-static-bindings.php

// self:: 的限制 ¶
// 示例 #1 self:: 用法
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test(); // A
