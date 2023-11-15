<?php
//! abstract is something that we dont
//! understand clearly

abstract class Vehicles {
    //! can also have non abstarct methods too.
    //! if a method inside a class is abstract then the class must be abstract.
    abstract public function doMaintenance();
    //! abstract methods are implemented by the child class they are called.
}


//! even if we dont explicitely given a abstract keyword
//! the compiler will give here because
//! they are not implementing the abstact class of parent class
//! there child are doing it so they are abstract class
abstract class TransportationVehicles extends Vehicles {

}

abstract class PassangerVehicles extends Vehicles {

}

//! there is no meaning to create a object for the above class
//! because there is no clarity what
//! they are reffering
//! programmers dont need to create a object for these type of class
//* so we can use abstract


//! a class that implement all abstract methords of parent class
//! called Concrete Class.
class Car extends PassangerVehicles {
    public function doMaintenance() {

    }
}

class Bike extends PassangerVehicles {
    public function doMaintenance() {
        
    }
}

class Truck extends TransportationVehicles {
    public function doMaintenance() {
        
    }
}

//! unlike the above class there is a clear understanding of what it refering to.