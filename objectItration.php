<?php

// class Student {
//     public $name = "John";
//     public $gender = "Male";
//     private $age = 26;
// }

// $obj = new Student();

// foreach ($obj as $key => $value) {
//     print "obj[$key] = $value</br>";
// }

class BookStore implements IteratorAggregate {
    public $storeName;
    public $location;
    public $books = array();
    public function __construct($storeName, $location, $books) {
        $this->storeName = $storeName;
        $this->location = $location;
        $this->books = $books;
    }
    // public function rewind(): void{
    //     //!reset() will move the array pointer to the first position.
    //     reset($this -> books);
    // }

    // public function current() {
    //     //! will return current array pointing element.
    //     return current($this -> books);
    // }

    // public function key() {
    //     //! key will return current array pointers key
    //     return key($this -> books);
    // }

    // public function next(): void{
    //     //! to get next element of an array
    //     return next($this -> books);
    // }

    // public function valid(): bool {
    //     return false !== current($this -> books);
    // }

    function getIterator() {
        return new ArrayIterator($this->books);
    }
}

class Book {
    public $bookName;
    public $author;
    function __construct($name, $author) {
        $this -> bookName = $name;
        $this -> author = $author;
    }
}

$books = array();
$books[] = new Book("Book1","Author1");
$books[] = new Book("Book2","Author2");
$books[] = new Book("Book3","Author3");
$bookStoreObj = new BookStore("ABC Book Store", "xyz", $books);

//! while using IteratorAggregate() interface
//! we must implement getIterator() in the code
//!
foreach($bookStoreObj as $book) {
    print "Book Name: ".$book -> bookName."Author Name: ".$book -> author."</br>";
}