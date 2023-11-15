<?php

// class Student {
//     public $name;
//     public function __construct($name){
//         $this->name = $name;
//     }
// }

// $stuObj = new Student("Akshay P M");

// //! assignment operator only create a copy of the object not a clone.
// $otherStuObj = $stuObj;

// $newStuObj = clone $stuObj;

// $otherStuObj -> name = "Jack";

// $newStuObj -> name = "Arun";

// var_dump($stuObj);
// echo "</br>";
// var_dump($newStuObj);

//! types of cloning
//! 1.Shallow Copy
//! 2.Deep Copy

//! by defalut clone create a shallow copy of an object
//! if the main object contain clone of any other object inside it
//! it will not create a clone of it.

// class Charger {
//     public $name;

//     public function __construct($name){
//         $this->name = $name;
//     }

//     public function charging() {
//         echo "Charger name: ".$this -> name." Charging.............";
//     }
// }

// class ToyCar {
//     public $carName;
//     public $color;
//     public $chargerObj;

//     public function __construct($carName, $color, $chargerObj){
//         $this->carName = $carName;
//         $this->color = $color;
//         $this->chargerObj = $chargerObj;
//     }
// }

// $charObj = new Charger("6 Volt Charger.");
// $carObj = new ToyCar("Car 1", "Black", $charObj);

// $otherObj = clone $carObj;

// $otherObj->carName = "Car 2";
// $otherObj->chargerObj->name = "12 Volt Charger";

// print_r($carObj);

// echo "</br>";

// print_r($otherObj);

//! deep cloning create the clone for the orginal object and if that
//! object contains some other objects, it also create clones for them too.

class Charger {
    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function charging() {
        echo "Charger name: ".$this -> name." Charging.............";
    }
}

class ToyCar {
    public $carName;
    public $color;
    public $chargerObj;
    //! deep cloning
    public function __clone() {
        if (is_object($this -> chargerObj)) {
            $this->chargerObj = clone $this->chargerObj;
        }
    }

    public function __construct($carName, $color, $chargerObj){
        $this->carName = $carName;
        $this->color = $color;
        $this->chargerObj = $chargerObj;
    }
}

$charObj = new Charger("6 Volt Charger.");
$carObj = new ToyCar("Car 1", "Black", $charObj);

$otherObj = clone $carObj;

$otherObj->carName = "Car 2";
$otherObj->chargerObj->name = "12 Volt Charger";

print_r($carObj);

echo "</br>";

print_r($otherObj);

//! recursive cloning 
trait CloneAble {
    public function __clone() {
        foreach($this as $key => $value){
            if (is_object($value)) {
                $this -> $key = clone $this -> $key;
            }else if(is_array($value)){
                $newArray = array();
                foreach($value as $arrayKey => $arrayValue) {
                    if (is_object($value)) {
                        $newArray[ $arrayKey ] = clone $value;
                    } else {
                        $newArray[$arrayKey] = $arrayValue;
                    }
                }
                $this -> $key = $newArray;
            }
        }
    }
}

//! deep cloning will remove the double linking problem.