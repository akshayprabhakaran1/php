<?php

//! php constuctors and destructors was introduced in php 5.
//! destructor can't accept arguments

class A {
    function __construct() {
        echo "I am a newborn object.";
    }

    function __destruct() {
        echo "I am dying..";
    }

} 

class B extends A {
    function __construct() {
        parent::__construct();
        echo "Hai";
    }
}
 
$obj = new A();

//! this will not remove the  object from memory
//! only the referace to it $obj
unset($obj);

class MyObject {
    public function __construct(){
        echo "I have just been created.";
    }
    public function __destruct(){
        echo "I lived only for 5 seconds in the memory.";
    }
}

echo date('h:i:s');
$testObj = new MyObject();
sleep(5);
unset($testObj);
echo date('h:i:s');