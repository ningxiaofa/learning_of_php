<?php

//块级作用域[PHP不支持] [PHP支持函数作用域]
function varTest() {
  $x = 1;
  if (true) {
    $x = 2;  // 同样的变量x
    echo $x . PHP_EOL;  // 2
  }
  echo $x;  // 2
}

varTest();

//测试 块级作用域
function foo(){
  for ($i = 0; $i < 7; $i++) {
	  //TBD
  }
  echo $i; 
}
foo();