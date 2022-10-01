<?php

// https://blog.csdn.net/william_n/article/details/94729362

class Singleton
{ 
    private static $_instance = null;
 // 构造方法私有化, 则类无法在实例化, 即无法直接new 
    private function __construct() {   
        // Code here 
    }
    
    // 为了严谨, 使用__clone魔术方法, 并私有化, 即 类不能通过复制clone产生对象 
    private function __clone() {   
        // Code here 
    }

    // 定义一个在类外能够实例化类的方法, 一定要是public访问修饰符 
    public static function getInstance() {   
        if (!(self::$_instance instanceof self)) 
        self::$_instance = new self();   
        return self::$_instance;
 }
}

$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();
$singleton3 = Singleton::getInstance();
$singleton4 = Singleton::getInstance();

var_dump($singleton1);
var_dump($singleton2);
var_dump($singleton3);
var_dump($singleton4);