<?php

//! comparing object can be done in two ways
//! 1.Comparison Operator(==)
//! both objects are instances of the same class.
//! properties of both objects have the same values.
//! if both conditions are two then it returns true

class Car {
    public $name;
}

$carObj1 = new Car();
$carObj1 -> name = "Toyota";

// $carObj2 = clone $carObj1;
// $carObj2 -> name = "Honda";
$carObj2 = $carObj1;

// var_dump($carObj1 == $carObj2);

//! 2.Identity Operator( === )
//! both object variables are pointing to the same object.
var_dump($carObj1 === $carObj2);