<?php

class Person {
  public $name;
  public $age;

  function __construct($name, $age) {
      $this->name = $name;
      $this->age = $age;
  }
}

function modify_person(&$person) {
  // 在函数内部修改对象
  $person->name = 'new name';
  $person->age = 30;
}

// 创建一个初始对象
$person = new Person('John', 25);

// 记录对象修改前的内存使用情况
$start_memory = memory_get_usage();

// 在函数内部修改对象
modify_person($person);

// 记录对象修改后的内存使用情况
$end_memory = memory_get_usage();

echo "Difference: " . ($end_memory - $start_memory) . " bytes";

// 事实上，将对象作为显式引用传递到函数中并不会导致额外的内存使用，与将对象作为值传递相比也并不会更有效率。

// 在PHP中，当对象作为参数传递时，实际上传递的是一个指向该对象的指针。无论是将对象作为值还是引用传递，都需要在内存中存储指向该对象的指针，因此它们的内存使用情况是相同的。

// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/obj_prove_1.php
// Difference: 32 bytes                           
// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/obj_prove_1.php
// Difference: 32 bytes                           
// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/obj_prove_1.php
// Difference: 32 bytes                           
// ➜  learning_of_php git:(master) ✗ php 函数/函数传参/obj_prove_1.php
// Difference: 32 bytes                           
// ➜  learning_of_php git:(master) ✗ 

// 但是实际输出还是一直是32bytes的差异