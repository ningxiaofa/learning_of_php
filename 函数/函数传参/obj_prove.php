<?php

class Person
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}

function change_person_name($person, $new_name)
{
    $person->name = $new_name;
}

$person1 = new Person("John");

// 记录对象修改前的内存使用情况
$start_memory = memory_get_usage();

// 在函数内部修改对象
$person2 = change_person_name($person1, "Jane");

// 记录对象修改后的内存使用情况
$end_memory = memory_get_usage();

echo "Difference: " . ($end_memory - $start_memory) . " bytes";

// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/obj_prove.php
// Difference: 0 bytes                          
// ➜  learning_of_php git:(master) ✗ 


// 当对象作为值类型参数传递到函数中时，PHP会将该对象的引用复制一份，并将其传递给函数。这意味着在函数内部，虽然变量名不同，但是使用它们来访问和更改对象属性或方法实际上是在访问同一个对象。因此，在修改对象属性或调用对象方法时，不会创建任何额外的副本，也不会导致额外的内存使用。

// 以下是一个简单的示例，说明在函数中修改对象不会产生额外的内存使用：


// 在上面的示例中，我们定义了一个Person类，具有一个名为$name的公共属性。然后，我们定义了一个名为change_person_name的函数，该函数接受一个Person对象和一个新名称，并将新名称分配给该对象的$name属性。

// 当我们创建一个Person对象时，它拥有名字"John"。然后，我们使用memory_get_usage()函数记录了修改前和修改后的内存使用情况。接下来，我们调用change_person_name函数，并将$person1和新名称"Jane"传递给它。在函数内部，我们使用$person变量来访问传递进来的对象，并将新名称分配给该对象的$name属性。

// 最后，我们再次使用memory_get_usage()函数计算在函数调用期间使用的内存量之差并将其输出。运行上述示例，输出结果应该是类似于Difference: 0 bytes的内容，这表示在函数调用期间没有额外的内存使用。

// 因此，在函数中修改对象不会产生额外的内存使用，因为实际上只是在访问同一个对象。