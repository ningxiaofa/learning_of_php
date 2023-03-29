<?php

class Person {
    public $name;
    
    function __construct($name) {
      $this->name = $name;
    }
  }
  
  function change_person($person) {
    // 修改对象的引用
    $new_person = new Person("Jane");
    $person = $new_person;//对对象本身的直接修改，不会影响原对象
  
    // 修改对象的属性
    $person->name = "Doe";
  }
  
  $person1 = new Person("John");
  $person2 = $person1;
  
  change_person($person2);
  
  echo $person1->name; // 输出 "John"
  echo PHP_EOL;
  echo $person2->name; // 输出 "John"

// 函数对该对象的更改不会影响原始对象本身，但是对于对象属性和方法的更改则会影响所有引用该对象的变量.

  