<?php

//! Early Binding(Compile Time)
//! Late Binding(Runtime)
//! php uses early binding for self and static

// class A {
//     public $name = "Class A";

//     public function printValue() {
//         echo $this -> name;
//     }

//     public function test() {
//         $this -> printValue();
//     }
// }

// class B extends A {
//     public function printValue() {
//         echo "</br>Im in class B.";
//     }
// }

class A {
    public static $name = "Class A";

    public static function printValue() {
        echo static::$name;
    }

    public static function test() {
        static::printValue();
    }
}

class B extends A {
    public static function printValue() {
        echo "</br>Im in class B.";
    }
}

// $objA = new A;
// $objB = new B;

//! both are early bindings
// echo $objA -> name;
// $objA->printValue();

//! late bindings
// $objA->test();
// $objB->test();

//! to deal with the issue of late binding in static methods
//! php introduced static:: keyword instead of self
A::test();
B::test();