<?php

// https://learnku.com/laravel/t/3844/understanding-php-delayed-static-binding-late-static-bindings

class A {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}

class B extends A {
    public static function test() {
        A::foo(); // 非转发调用 -- 那么非转发调用其实就是明确指定类名的静态调用（foo::bar ()）和非静态调用 ($foo->bar ())
        
        // 转发调用 -- 所谓的 “转发调用”（forwarding call）指的是通过以下几种方式进行的静态调用：
        // self::，parent::，static:: 以及 forward_static_call () -- 也就是不再区分parent原来的意思了
        static::foo(); 
        parent::foo();
        self::foo();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}
class C extends B {
    public static function who() {
        echo __CLASS__."\n";
    }
}

C::test();

// A
// C
// C
// C