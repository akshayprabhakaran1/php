<?php

//! the concept of method overloading is 
//! completely different, here it means too call
//! a method that has not been declared in a class.
//! __call() and __callStatic() are two methods given
//! by php to make a method overloading possible

//! when we try to call a non existing method on
//! a class the __call() method is trigger

class Test {
    public function __call($methodName, $arguments) {
        echo "Method Name: '$methodName' with Arguments("
        .implode(',', $arguments). ")</br></br>";
    }

    public static function __callStatic($methodName, $arguments) {  
        echo "Static method $methodName is called.";
        if ($methodName == "multiply") {
            $total = 1;
            foreach($arguments as $num) {
                $total *= $num;
            }
            echo "Answer is = $total";
        } else {
            echo "I am not doing anything!!";
        }
    }
}

$obj = new Test;

//! __call() is called.
$obj -> runTest(1, 2);

//! __callStatic() is called
Test::multiply(2, 4, 3);