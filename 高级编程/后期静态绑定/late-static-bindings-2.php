<?php

// https://www.php.net/manual/zh/language.oop5.late-static-bindings.php

// 后期静态绑定的用法 ¶
// 后期静态绑定, 本想通过引入一个新的关键字表示运行时最初调用的类来绕过限制。
// 简单地说，这个关键字能在上述例子中调用 test() 时引用的类是 B 而不是 A。最终决定不引入新的关键字，而是使用已经预留的 static 关键字。

// 示例 #2 static:: 简单用法
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who(); // 后期静态绑定从这里开始
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B1::test(); // B