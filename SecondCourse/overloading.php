bb<?php

//! overloading
//! property overloading
//! method overloading

//! magic methods that are used for property overloading.
//! __set() method is called when we try to write to an overloaded property.
//! __isset() is called when we call php's Build in function
//! isset() on a overloaded property

class Student {
    private $_extraInfo = array();
    public function __set($propertyName, $propertyValue) {
        $this -> _extraInfo[$propertyName] = $propertyValue;
    }

    public function __get($propertyName) {
        if (array_key_exists($propertyName, $this -> _extraInfo)) {
            return $this -> _extraInfo[$propertyName];
        } else {
            return null;
        }
    }

    public function __isset($propertyName) {
        if (isset($this -> _extraInfo[$propertyName])) {
            echo "Property \$$propertyName is set.</br>";
        } else {
            echo "Property \$$propertyName is not set.</br>";
        }
    }

    public function __unset($propertyName) {
        unset($this -> _extraInfo[$propertyName]); 
        echo "\$$propertyName is unset.</br>";
    }
}

// $stuObj = new Student();
// $stuObj->name = "Good Grades</br>";
// echo $stuObj->email;

$objStudent = new Student();

$objStudent -> birthCountry = "Germany";
$objStudent -> nationality = "UK";

echo $objStudent -> birthCountry;
echo $objStudent -> nationality;

isset($objStudent -> birthCountry);
isset($objStudent -> nationality);
echo "</br>";

unset($objStudent -> birthCountry);
unset($objStudent -> nationality);
echo "</br>";

//! we cannot create static properties dynamically
//! property overloading only works in object context.