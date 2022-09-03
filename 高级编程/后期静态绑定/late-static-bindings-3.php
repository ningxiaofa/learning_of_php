<?php

// https://www.php.net/manual/zh/language.oop5.late-static-bindings.php

// 注意:
// 在非静态环境下，所调用的类即为该对象实例所属的类。由于 $this-> 会在同一作用范围内尝试调用私有方法，而 static:: 则可能给出不同结果。另一个区别是 static:: 只能用于静态属性。
// 示例 #3 非静态环境下使用 static::

class A {
    private function foo() {
        echo "success!\n";
    }
    public function test() {
        $this->foo();
        static::foo(); // $c = new C();  $c->test(); -- 报错点
    }
}

class B extends A {
   /* foo() 将复制给 B，因此它的作用域将是 A 并调用成功 */
}

class C extends A {
    private function foo() {
        /* 替换原来的方法；新的作用域是 C */
    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();   //fails

// success!
// success!
// success!


// Fatal error:  Call to private method C::foo() from context 'A' in /tmp/test.php on line 9