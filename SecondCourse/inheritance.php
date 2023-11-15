<?php

class Vehicle {

    private $noOfWheels;
    private $color;
    private $fuel;
    private $speed;
    
    public function getNoOfWheels() {
        return $this -> noOfWheels;
    }

    public function setNoOfWheels($wheels){
        $this -> noOfWheels = $wheels;
    }

    public function getColor() {
        return $this -> color;
    }

    public function setColor($color) {
        $this -> color = $color;
    }

    public function getFuel() {
        return $this -> fuel;
    }

    public function setFuel($fuel) {
        $this -> fuel = $fuel;
    }

    public function getSpeed() {
        return $this -> speed;
    }

    public function setSpeed($speed) {
        $this -> fuel = $speed;
    }

    public function start() {
        echo "speed..</br>";
    }

    public function accelerate() {
        echo "accelerate..</br>";
    }

    public function brake() {
        echo "brake..</br>";
    }
}

class Car extends Vehicle {
    //! overriding
    public function getNoOfWheels() {
        //! if you want to get thing of parent class use the below.
        parent::getNoOfWheels();
        echo "HAI";
    }
}