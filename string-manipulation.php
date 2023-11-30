<?php 

$str = "Akshay.prabhakaran@qb.com ";

//! split the string into two char with a dot in the middle
// echo chunk_split($str, 2, ".");

//! show distinct char of the string
// the 3 is mode
// print_r(count_chars($str, 3));

//! break a string into array
//! first argument is the breaking point
// $str = explode(".", $str);
// print_r($str);

//! Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities
// $str = "This is some <b>bold</b> text.";
// echo htmlspecialchars($str);
// converted to this in html
//! This is some &lt;b&gt;bold&lt;/b&gt; text.

//! Returns a string from the elements of an array(join)
// print_r(implode(".", $str));

//! convert the first letter to lower case
// echo lcfirst($str);

//! insert line breaks where newlines (\n) occur in the string
// echo nl2br("One line.\nAnother line.");
//! output to html docs
//One line.<br />
//Another line.

//! to get length of a string
// print_r(strlen($str));

//! to revesrce a string
// echo strrev($str);

//! convert all letters to uppercase
// echo strtoupper($str);

//! convert all letters to lowercase
// echo strtolower($str);

//! replaces a part of a string with another string
// echo substr_replace("Hello","world",0);

//! remove whitespace and other charecters from both side of a string
// trim($str);

//! convert first charecter of a string to uppercase
// echo ucfirst($str);

//! convert first charecter of a each word in a string to uppercase
// echo ucwords($str);



