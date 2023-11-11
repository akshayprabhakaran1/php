<?php

//! php is loosly typed language.

//! case sensitive
// $Message = "Hello World!";
// $name = "Akshay P M";

//! variable declaration
// $user_id = null;
// $count = 3;
// $price = 1.99;
// $status = true;
// $verify = false;

//! var_dump functions
// var_dump( $name );
// var_dump( $count );
// var_dump( $price );
// var_dump( $status );
// var_dump( $user_id );

//! operations in php
// var_dump( $count + $price );
// var_dump( $count * $price );

//! dot operator
// echo $Message . " " . $name;

//! logical operations
// var_dump( $status and $verify );
// var_dump( $status or $verify );
// var_dump( $status xor $verify );
// var_dump( !$verify );
// var_dump( $status && $verify );
// var_dump( $status || $verify );

//! variable interpolation
// echo "Hello $name";
// echo "Hello {$name}";

//! array in php
// $array1 = ["f1", "f2", "f3"];
// $array = array("First Post", "Middle Post", "Last Post");

//! does not display array
// echo $array;

// var_dump($array[0]);

//! can use integer and string as array index
//! not another types
// $article = [
//     0 => "Akshay",
//     1 => "Arjun",
//     3 => "Ravi",
//     "Kailas"
// ];

// $article1 = [
//     "zero" => "Akshay",
//     "one" => "Arjun",
//     "three" => "Ravi",
//     "Kailas"
// ];

// var_dump($article1["one"]);

//! adding different elments in one array
// $all_type_array = [
//     "one" => "Hello world!",
//     "count" => 150,
//     "pi" => 3.14,
//     "status" => false,
//     1 => null,
//     $count,
//     $price
// ];

// var_dump($all_type_array);

//! multidiamentional array
// $array = [
//     ["title" => "First post", "content" => "This is the first post.",],
//     ["title" => "Another post", "content"=> "Another post to read here",]
// ];

// var_dump($array[1]["title"]);

//! accessing and processing each element of a array
// $array = array("First Post", "Middle Post", "Last Post");
// foreach($array as $article) {
//     echo $article, ". ";
// } // no semi colon is needed at the end of a code block. 

// foreach ($array as $key => $value) {
//     echo $key ." ". $value;
// }

//! if loop
/* empty() function return true or false*/
// $array = [];

// if (empty($array) ) {
//     echo "The array is empty";
// } else {
//     echo "The array is not empty";
// }

//! comparison operators
// var_dump(3 == 4);
// var_dump(5 == 5);
// var_dump(6 != 6);

//! while loop
// $month = 1;

// while($month <= 12) {
//     echo $month . ", "; // $month will automatically converted to string.
//     $month = $month + 1;
// }

//! for loop
// for ($i = 0; $i <= 10; $i++) {
//     echo $i .", ";
// }

//! switch statements
// $day = "mon";

// switch ($day) {
//     case "mon":
//         echo "Monday";
//         break;
//     case "tue":
//         echo "Tuesday";
//         break;
//     case "wed":
//         echo "Wednesday";
//         break;
//     case "thu":
//         echo "Thursday";
//         break;
//     case "fri":
//         echo "Friday";
//         break;
//     case "sat":
//         echo "Saturday";
//         break;
//     case "sun":
//         echo "Sunday";
//         break;
//     default:
//         echo "Please enter a valid day.";
//         break;
// }



$array = [];

for ($i = 1; $i <= 10; $i++) {

    if($i < 4) {
        $array[] = "a";
    }elseif ($i > 3 and $i < 8) {
        $array[] = "b";
    }elseif($i >= 8) {
        $array[] = "c";
    }
}

// echo $array;
echo "hello world";