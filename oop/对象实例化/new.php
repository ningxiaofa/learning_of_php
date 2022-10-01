<?php

// https://www.php.cn/php-weizijiaocheng-434812.html

/**
 * PHP创建对象的多种方式，本质上就两种，通过关键字：new 和 clone
 */
class Person
{
  private $name = 'william';

  public function getName()
  {
    return $this->name;
  }

  public static function getObjBySelf()
  {
    return new self();
  }

  //动态延迟绑定，能识别调用者
  public static function getObjcByStatic()
  {
    return new static();
  }

}

//Person子类 Teacher
class Teacher extends Person
{
  public static function getObjByParent()
  {
    return new parent();
  }
}

// 1、new 类名();创建对象
$obj1 = new Person(); //等价于写法 $obj1 = new Person;
echo '类名：' . get_class($obj1) . '<br>';
echo $obj1->getName() . '<hr>';

// 2、将类名字符串赋值给一个变量，通过变量创建
$clsName = 'Person';
$obj2 = new $clsName();
echo '类名：' . get_class($obj2) . '<br>';
echo $obj2->getName() . '<hr>';

// 3、通过对象实例创建对象
$obj3 = new $obj2();
echo '类名：' . get_class($obj3) . '<br>';
echo $obj3->getName() . '<hr>';

// 4、通过 new self()
//$obj4 = (new $obj3())->getObjBySelf();
$obj4 = Person::getObjBySelf();
echo '类名：' . get_class($obj4) . '<br>';
echo $obj4->getName() . '<hr>';

// 5、通过 new parent()
$obj5 = Teacher::getObjByParent();
echo '类名：' . get_class($obj5) . '<br>';
echo $obj5->getName() . '<hr>';

// 6、通过 new static();
$obj6 = Person::getObjcByStatic();
echo '类名：' . get_class($obj6) . '<br>'; //类名：Person
echo $obj6->getName() . '<hr>'; //bruce
//当用子类去调用时候，发现static自动识别当前调用者（静态延迟绑定），返回当前调用者对象
$obj7 = Teacher::getObjcByStatic();
echo '类名：' . get_class($obj7) . '<br>'; //类名：Teacher
echo $obj7->getName() . '<hr>'; //bruce
$obj8 = Person::getObjBySelf();
echo '类名：' . get_class($obj8) . '<br>'; //类名：Person
echo $obj8->getName() . '<hr>';
//new self()在子类中调用依旧返回原来父类的绑定
$obj9 = Teacher::getObjBySelf();
echo '类名：' . get_class($obj9) . '<br>'; //类名：Person
echo $obj9->getName() . '<hr>';
