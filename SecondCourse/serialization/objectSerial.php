<?php
//! Object Serialization.
//! network infrastructure, hard disk and database
//! doesn't understand php objects.
//! so to sent a object through a network or
//! store it in database we need to seralize the object
//! when we serialize a object it doesn't contain any details 
//! about method of the object.

//! serialize() and unserialize() are not only for object 
//! we can use it for any php variables

//! magic methods for serialization
//! __sleep() and __wake()

//! __sleep() is useful to do some cleaning up before
//! serializing an object
//! like closing a database connection
//! saving the file and close it before serialization.

//! __wakeup() is automatically called when we unserialize an objcet
//! mainly used to reconnect to database, reopen a closed file ect 

class Student {
    public $id;
    public $name;
    public $address;
    public $age;
    public function printStudentInfo() {
        echo "Student name : ". $this -> name. "</br>";
        echo "Student id : ". $this -> id. "</br>";
    }
    // public function __sleep() {
    //     return array("id", "address");
    // }

    public function __sleep() {
        //! to store all object properties we can use
        //! get_object_vars($this)
        //! array_keys will return only the keys of array

        return array_keys( get_object_vars($this));
    }

    public function __wakeup(){
        echo "Hello wakeup!";
    }
}
