<?php

//! php is a sigle parent class
//! means class that can only have one parent class

//! interface is a way to communicating between two unlike classes.

interface TestInterface {
    public function foo();
}

class TestClass implements TestInterface {
    public function foo() {
        echo "This is a class from TestInterface";
    }
}