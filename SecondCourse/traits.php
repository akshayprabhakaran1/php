<?php

//! php is a single inheritance language and
//! multiple inheritance is not possible here.
//! so in php Traits gives us the "multiple inheritance" thing
//! precedence of override in php
//! 1. Current Class Method
//! 2. Trait Method
//! 3. Base Class Method

trait Chargeable {
    public function charge() {}
    //! properties of this traits cannot be
    //! name used in the other class using traits
    abstract public function amount();
}

trait AnotherTrait {
    public function charge() {}
    public function a() {}
}

class Toy {}

class ElectricCarToy extends Toy {
    // use Chargeable{charge as private;}
    use Chargeable, AnotherTrait {
        //! to avoid nameing conflict bt traits
        Chargeable::charge insteadof AnotherTrait;
        //! to alias the name of a funtion in traits to some other name
        AnotherTrait::charge as xyz;
    }

    public function amount() {}

}

$o = new ElectricCarToy();
$o->charge();
$o->a();