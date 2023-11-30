<?php

$array = array("a" => 1, "bc" => 4, "c", "d", "e", "e");

//! convert the array key cases
// echo "<pre>";
// print_r(array_change_key_case($array, CASE_UPPER));
// echo "</pre>";

//! splitng array into length of two chunks
// echo "<pre>";
// print_r(array_chunk($array, 2));
// echo "</pre>";

//! returns the values from a single column in the input array
// get column of last names from a recordset
// echo "<pre>";
// print_r(array_column($array));
// echo "</pre>";

//! create an array by using the elements from one "keys" array and one "values" array
// $fname=array("Peter","Ben","Joe");
// $age=array("35","37","43");

// $array=array_combine($fname,$age);

// echo "<pre>";
// print_r($array);
// echo "</pre>";

//! count all the values of an array
// print_r(array_count_values($array));
// output
// Array ( [1] => 1 [4] => 1 [c] => 1 [d] => 1 [e] => 2 )

//! fill an array with values
// $a1 = array_fill(3,4,"blue");
// print_r($a1);

//! fill array with values with specific keys
// $keys=array("a","b","c","d");
// $a1=array_fill_keys($keys,"blue");
// print_r($a1);

//! keys will change to values and vice versa
// echo "<pre>";
// print_r(array_flip($array));
// echo "</pre>";

//! returns all keys from the array
// print_r(array_keys($array));

//! check if array key exist or not
// var_dump(array_key_exists("a", $array));

//! merge two or more arrays into one array
// $a1=array("red","green");
// $a2=array("blue","yellow");
// print_r(array_merge($a1,$a2));

// $a1=array("a"=>"red","b"=>"green");
// $a2=array("c"=>"blue","b"=>"yellow");
// print_r(array_merge_recursive($a1, $a2));
// Array ( [a] => red [b] => Array ( [0] => green [1] => yellow ) [c] => blue )