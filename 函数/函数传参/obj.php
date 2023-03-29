<?php

class Person {
    public $name;
    
    function __construct($name) {
        $this->name = $name;
    }
}

function change_name($person, $new_name) {
    $person->name = $new_name;
}

$person1 = new Person("John");
$person2 = $person1; // 引用复制，只是复制指针.

change_name($person2, "Jane");

echo $person1->name; // 输出 "Jane"
echo PHP_EOL;
echo $person2->name; // 输出 "Jane"

// 因为$person1和$person2引用同一个对象，并且对于该对象的任何更改（包括其属性）在所有引用该对象的变量中都是可见的。

// ⚠️ 简单解释：
// $person1 = new Person("John");
// $person2 = $person1;
// $person1 -------> obj_value_1 <------- $person2

// change_name($person2, "Jane"); // 改变了$person2[新对象，即引用类型传递] 同时改变所有引用该value的对象属性和方法
// $person1 -------> obj_value_2  <------- $person2
