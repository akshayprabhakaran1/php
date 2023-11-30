<?php

//! php will never tell you if you accidentally pass
//! data of wrong type.
//! type hinting is used with function parameters only.
//! Scalar Data Types
//! 1.bool, 2.int, 3.float, 4.string
//! Non Scalar Data Types
//! 5.Class/Interface name, 6.self, 7.array, 8.callable

//! Class and Interface names
// class Mobile {
//     public $isCharged;
// }

// class Charger {
//     public function charge(Mobile $mobile, $chargingTime){
//         echo "Charging mobile for ".$chargingTime." mins</br>";
//         $mobile -> isCharged = true;
//     }
// }

// $time = 10;
// $abc = "chair";
// $mobObj = new Mobile;
// $charger = new Charger;

// $charger->charge($mobObj, $time);
// $charger->charge($abc, $time);

//! self
//! public function testSelf(self $myObj)
//! now the method will only accept the argument that is an
//! instanceof the same class in which the method is defined

// class A {
//     public static function checkValue() {
//         echo "Im from class A</br>";
//     }
//     public static function test(self $a) {
//         $a::checkValue();
//         //! to call class B checkValue() use static
//         // static::checkValue();
//     }
// }

// class B extends A{
//     public static function checkValue(){
//         echo "Im from class B</br>";
//     }
// }

// $objB = new B;
// $objA = new A;
// $objB::test($objA);

//! callable or callback
//! when a function is passsed as an argument of another function.
//! we can use php bulidin function call_user_func('name of function', remainng are parameters of the function)

function myCallbackFunction($name) {
    echo $name . "</br>";
}

class MyClass {
    function myCallbackPubMethod($namePub){
        echo "Callback public class method.</br>";
    }
    public static function myCallbackStaticMethod($nameSt){
        echo "Callback static class method.</br>";
    }
}

class TestClass {
    public function testing(callable $callBackFunc, $funcArg) {
        $callBackFunc($funcArg);
        call_user_func($callBackFunc, $funcArg);
    } 
}

$obj = new TestClass();
$myObj = new MyClass();

// $obj->testing(array($myObj, 'myCallbackMethod'), 'callable');
//! to callback a static method
$obj->testing(array('MyClass', 'myCallbackStaticMethod'), 'callable');
$obj->testing('MyClass::myCallbackStaticMethod', 'callable');

//! scalar type hinting
//! php gives us a optional directive "strict_types" to enable strict mode.
//! declare(strict_type=1); at the top of the file even before namespaces
//! strict mode should be defined where the function call is been made not the file
//! where function is defined