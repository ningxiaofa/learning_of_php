<?php

class MyClass
{
    protected $argv;

    public function __construct($argv) 
    {
        $this->argv = $argv;
    }

    public function getArgv()
    {
        return $this->argv; //access args using $this->args
    }
}

// 里面获取不了，便传递进去【这里的value也是全局上下文，否则还是不行】
$myClass = new MyClass($argv);
var_dump($myClass->getArgv());

// ➜  learning_of_php git:(master) ✗ php 变量/超级全局变量/argv/argv2.php arg1 arg2 arg3
// array(4) {
//   [0]=>
//   string(40) "变量/超级全局变量/argv/argv2.php"
//   [1]=>
//   string(4) "arg1"
//   [2]=>
//   string(4) "arg2"
//   [3]=>
//   string(4) "arg3"
// }