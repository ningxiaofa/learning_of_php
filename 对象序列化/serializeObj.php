<?php

class Person
{	
	public $name;
	public $gender;

	public function say()
	{
		return $this->name . ' is ' . $this->gender;
	}
}

//序列化
$student = new Person();
$student->name = 'William';
$student->gender = 'male';
// var_dump($student); //object(Person)#1 (2) { ["name"]=> string(7) "William" ["gender"]=> string(4) "male" } 
// echo $student->say(); //William is male
$objStr = serialize($student);
file_put_contents('objStr.txt', $objStr);

$objStr1 = file_get_contents('objStr.txt');
$obj1 = unserialize($objStr1);
// var_dump($obj1); //object(Person)#2 (2) { ["name"]=> string(7) "William" ["gender"]=> string(4) "male" }
echo $obj1->say(); //William is male 确实还可以输出. 但是类的定义一定要找到

