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
//! error_log(msg, type, destination, header); returns true if error is logged succesfully
// error_log("This is an error msg");
// error_log("This error is send to email", 1, "akshayambadi@gamil.com", "Subject: Foo \n From: efg@gamil");
// error_log("This is error is going to a costom file.\n", 3, "c://path");

//! php has a build in error handler which will handle all types of errors.
//! creating a custom error handler
//! user generated error handlers can handle warnings, notices, user generated fatal errors only.
//! custiomFunName(error_level(2, 8, 256, etc), error_msg, error_file, error_line, error_context) first two parameters are reqired and others are optional.
// function ourErrorHandlerFuntionName($error_level, $error_msg){
//     echo "Logic of your error.";
//     die();
// }

// set_error_handler("ourErrorHandlerFuntionName");

//! exceptions in php
//! exceptions are not errors they are codes that
//! may potentialy could cause an error.
//! try, throw, catch
//! if thrown exception is not catch it will create a fatal error.
// $file = "path";

// class FileException extends Exception {
//     public function fileErrorMessage() {
//         $errorMsg = 'File error' . $this->getMessage() .
//             '</br>Error on line.' . $this->getLine();
//         ' in ' . $this->getFile();

//         return $errorMsg;
//     }
// }

// try {
//     if (!file_exists($file)) {
//         throw new FileException("File Not Found");
//     }
//     echo "Hello";
// } catch (FileException $e) {
//     echo "Message ". $e -> fileErrorMessage();
// }

//! re-throw exceptions
// class FileException extends Exception {

// }

// class CopyFileException extends Exception{

// }

// try {
//     try {
//         throw new CopyFileException("File copy problem.");
//     } catch (CopyFileException $e) {
//         throw new FileException("File problem.", 0, $e);
//     }
//     echo "This statement will not be printed";
// } catch (FileException $e) {
//     echo "latest Exception ". $e -> getMessage();
//     //! to get previous exception message
//     echo "</br>previous Exception ". $e -> getPrevious() -> getMessage();
// }

//! top level exception handler
//! when you work on a big application, there is a
//! possibility of some uncaught exceptions
//! so php gives you a solution for all uncaught exceptions.
//! set_exception_handler();

//! assert() to check weather a statement will retuen a warning
//! it returns true of false
$number = 1;
assert($number == 1);
assert($number == 2);
