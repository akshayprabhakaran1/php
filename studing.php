<?php

// class MyIterator implements Iterator {
    
//     private $arr = array(); 
//     public function __construct(array $items) {
//         $this -> arr = $items;
//     }

//     public function rewind(){

//     }

//     public function valid(){
//     }

//     public function key(){
//     }

//     public function current(){
//     }

//     public function next(){
//     }


// }

// class myData implements IteratorAggregate {
//     public $property1 = "public property one";
//     public $property2 = "public property two";
//     public $property3 = "public property three";
//     public $property4 = "";

//     public function getIterator(): Traversable{
//         return new ArrayIterator($this);
//     }
// }

// $obj = new myData;

// foreach($obj as $key => $value) {
//     var_dump($key, $value);
//     echo "\n";
// }

//! folder creation and deletion
// mkdir("foo/bar", recursive: true);
// rmdir("foo/bar");

// //! to cheak file exist or not
// if (file_exists("foo.txt")) {

//     //! will store the results in a cache
//     echo filesize("foo.txt");

//     //! to put content to a file
//     file_put_contents("foo.txt","Hello World!");

//     //! to clear the cache we can use
//     clearstatcache();
// } else {

//     echo "File Not Found!";
// }

//! error supression operator @
//! fopen will return a resource datatype
//! which returns a referace to the location of the file
// $file = @fopen("foo.txt","r");

// //! can write to a file using fwrite()

// //! can get a csv file using fgetcsv()
// while (($line = fgetcsv($file)) !== false) {
//     echo $line. "<br/>";
// }

// //! fget() will return lines from the file resource
// //! strict comparison is used because  if the $line has false as string value it will get
// //! to unexpected bugs
// while (($line = fgets($file)) !== false) {
//     echo $line. "<br/>";
// }

// //! after the use of that particular file is completed
// fclose($file);

//! to get value from a file
// $content = file_get_contents("foo.txt", offset: 3, length: 2);

//! without overriding
// file_put_contents("foo.txt","Hello World!", FILE_APPEND);
// print_r($content);

//! to delete a file we can use unlink()
// unlink("foo.txt");

//! to copy a file
// copy("foo.txt","bar.txt");

//! to move a file or rename a file 
// rename("foo.txt","bar.txt");

//! to get info about file
// pathinfo("foo.txt", PATHINFO_BASENAME);
?>