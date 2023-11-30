<?php

//! php is a sigle parent class
//! means class that can only have one parent class

//! interface is a way to communicating between two unlike classes.
//! all the methods inside a interface should be public no private or protected

//! interface can extent other interfaces

//! we cannot can have properties in interface but we can have constants
//! constants in interface cannot be override

interface TestInterface {

    public const MY_CONSTANT = 11;
    public function foo();
}

interface AnotherInterface {
    public function baa();
}

interface BaaInterface extends AnotherInterface, TestInterface{
    public function baa();
}

class TestClass implements TestInterface {
    public function foo() {
        echo "This is a class from TestInterface";
    }
}