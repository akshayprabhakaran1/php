<?php

class Student {
    public $id;
    public static $student_id = 1234;
    //! when class get called it create a
    //! copy of each non static elements for all objects
    //! but not for static elements
    //! $this wont work in static methords
    public static function someFunction() {
        echo "Static Methord";
        // ! cannot call this.
        // echo $this -> $id;
        echo self::$student_id;
    }
}
echo Student::someFunction();