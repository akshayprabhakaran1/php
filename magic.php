<?php
//! __construct(), __destruct() custructor and destructor.
//! __call() __callStatic(), __get(), __set(), __isset() __unset() overloading
//! __sleep(), __wakeup() serialization
//! __clone() cloning of an object

//! __toString()
// class Test {
//     public $name;
//     public function __construct($name) {
//         $this->name = $name;
//     }
//     public function __toString() {
//         return "".$this->name;
//     }
// }

// $obj = new Test("Akshay");
// echo $obj;


//! __set_state() is called when var_export() function is used
//! var_export() function convert a variable or a object
//! into a parseable string(php code)
//! we can run that php code using php eval function.

// class Test2 {
//     private $value1;
//     private $value2;
//     function __construct() {
//         $this->value1 = 100;
//         $this->value2 = "name";
//     }

//     public static function __set_state(array $array) {
//         echo $array["value1"];
//     }
// }

// $testObj = new Test2();
// $str = var_export($testObj, true);
// eval($str.";");

//! __invoke() is automatically called
//! when we use object of our class as function.

// class Test3 {
//     public function __invoke() {
//         echo "I can't act as a function now.....";
//     }
// }

// $obj = new Test3;
// $obj();

//! to check a obj is callable or not using
//! is_callable();

class Student {
    private $id;
    public $name;

    public function __construct($id, $name) {
        $this -> id = $id;
        $this -> name = $name;
    }

    public function __debugInfo(){
        return array('Student ID' => $this -> id);
    }
}

$stuObj = new Student(2, "akshay");

//! will return all properties even private, protected and public.
var_dump($stuObj);

//! if we use __debugInfo() inside a method
//! var_dump() this will return what we returned inside the __debugInfo()