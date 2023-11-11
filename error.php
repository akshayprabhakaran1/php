<?php

//! error and exception are implemented from a interface throwable in the php 7.
//! types of errors
//! 1.Notice! (Non critical errors)
//! 2.Warning.
//! 3.Fatal Error.
//! 4.Parser Error or Syntax Errors.
//! 5.Strict Standard Notices.

//! Notice
//! ~  will ignore that type of errors
// error_reporting(E_STRICT & ~E_NOTICE);

// $x = $y + 5;
// echo "My Notices";

//! fatal error
//! if the file does not exist then the compiler will ignore the include
// include "my_php.php";
//! if the file does not exist then the compiler will show compile time fatal error.
//! as the name suggest the file is required for the application.
// require "my_php.php";

//! in php you can trigger an error using tigger_error() function.
//! trigger_error(error_msg, error_type) returns true or false returns false if wrong error type is specified,
//! error types like E_USER_ERROR, E_USER_WARNING,
//! E_USER_NOTICE, E_USER_DEPRECATED.
// $test = 2;
// if ($test == 2) {
//     trigger_error("Value is not 1.");
// }

//! displaying error in devolopment enviolment is good
//! but displaying it in production enviolment is security concern.

//! logging errors in a file
//! inside the php.ini file in php folder
//! put log_errors=On otherwise it is Off.
//! put error_log and give the location in "" where the .log file should be saved.

//! to log errors to differant places
//! error_log(msg, type, destination, header);
error_log("This is an error msg");
error_log("This error is send to email", 1, "akshayambadi@gamil.com", "Subject: Foo \n From: efg@gamil");
error_log("This is error is going to a costom file.\n" 3, "c://path");