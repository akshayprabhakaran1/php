<?php
//! blocking inheritance and overrides
//! with final classes and methods
//! for that php introduced final keyword.

final class A {
    final public function test() {
        echo "Class A test method.</br>";
    }
}

class B extends A {
    public function test() {
        echo "Class B test method.</br>";
    }
}