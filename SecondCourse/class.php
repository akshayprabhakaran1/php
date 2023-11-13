<?php

class myClass {

    //! $this refers to the current object.
    //! self refers to the class itself.

    public $color = "red";
    private $count = 100;
    const SMALL = 10;

    private function disCount() {
        echo $this->count;
    }

    public function displayInfo() {
        echo $this -> color;
    }

    public function displayColor() {
        echo $this -> displayInfo();
    }

    public function sumOfNum($num1, $num2) {
        //! to call a constant inside a class use self::constant_name
        return $num1 + $num2 + self::SMALL;
    }
}

//! here the new keyword create a
//! class and store it in memory and
//! referance of the memory is given to
//! obj variable.
$obj = new myClass();
$obj1 = new myClass();

//! to print object
// var_dump($obj -> color);
//! cannot access private properties or methords outside a class it is defined in.
// var_dump($obj1 -> $count);
// echo $obj -> disCount(); 
// print_r($obj1 -> sumOfNum(4 ,6));

//! to call a constant from a class
echo myClass::SMALL;