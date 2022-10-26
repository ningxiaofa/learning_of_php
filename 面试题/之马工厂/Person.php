<?php

class Person{

    private $name;
    private $weight;
    private $height;

    public function __construct($name, $weight, $height){
        $this->name = $name;
        $this->weight = $weight;
        $this->height = $height;
    }

    public function getName() {
        return $this->name;
    }
    public function getWeight() {
    	return $this->weight;
        
    }
    public function getHeight() {
        return $this->height;
    }

}
$person  = new Person('明明', '51.5', '165');
$height = $person->getHeight();
$weight = $person->getWeight();
var_dump($height, $weight);
