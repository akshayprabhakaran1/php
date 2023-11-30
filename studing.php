<?php

declare(strict_types= 1);

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
// //! to unexpected bugsThe CLI binary is distributed in the main folder as php.

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

$array = ["a", "b", "c"];

//! to remove the first element from the array
//! when using the array_shift() the array will get reindexed
//! unless it is a string key
// $a = array_shift($array);

//! to remove last element from the array
// $b = array_pop($array);

//! to delete an element from the array using unset
//! array will not be reindexed
//! if we del all the values and the insert it will insert in
//! the next max key
// unset($array["a"], $array['b']);


//! differance btw both are
//! array_key_exists will return true if the key exist in the array
//! even if it points to the null
// array_key_exists("a", $array);

//! on the other hand if the key points to null
//! isset will return false
// isset($array[1]);

// date_default_timezone_set("Asia/Kolkata");

//! as a second atribute we can pass a time() to get future or past time
// echo date('m/d/Y g:ia');

// echo date('m/d/Y g:ia', strtotime('last day of march 2023'));

// $date = date('m/d/Y g:ia', strtotime('second fiday of january'));

//! give more details about the date
//! date_parse()
// date_parse_from_format('m/d/Y g:ia',$date);

//! alternative
// $dateTime = new DateTime("05/03/2023 3:30PM");
// $dateTime -> setTimezone(new DateTimeZone("Asia/Kolkata"));
// $dateTime -> setDate(2023, 09, 04) -> setTime(2, 15, 0);
// echo $dateTime -> format("Y-m-d H:i:s");


//! to convert newline attribute of php to a br in html
nl2br(implode("", $array));

//! create the file in append mode
//! if file doesnt exist then the file will be created
$handler = fopen("append.txt","a");
fwrite($handler, "aks\n");


?>