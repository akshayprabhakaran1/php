<?php

class Student {
    public $name = "John";
    public $gender = "Male";
    private $age = 26;
}

$obj = new Student();

foreach ($obj as $key => $value) {
    print "obj[$key] = $value</br>";
}