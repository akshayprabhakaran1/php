<?php
//! autoloading
//! is introduced to avoid writing of
//! include and requied more time in a big project.
//! so we write a autoloader funtion with our logic

// function loader($class) {
//     $filename = $class . ".php";
//     $file = "classes/" . $filename;
//     if (!file_exists($file)) {
//         return false;
//     }
//     include $file;
// }

//! we should register our autoloader funtion
//! using spl_autoloader_register()
//! you can register multiple autoloader function with spl_autoloader_register()
//! it will make queue of all the autoloader funtion basis of the call we make
//! two paremeter first one is the funtion and second one is the throw condition
//! is the loader fails it should throw a error or not
//! if the third parameters is true the autoloader will be first of the queue else last
// spl_autoload_register("loader");
// $prod = new Product();

//! namespaces
//! like a file directory but virtual
include 'auto.php';
include 'auto1.php';

//! print TestClass in global space not from the My Project namespace.
$testObj = new TestClass();

//! for getting class from namespace My Project
//! aliasing
use MyProject\TestClass as TC1;
$testObj1 = new TC1();

//! psr-4 is a autoloading standards that actually tells you
//! how to map your namespaces to real folders
//! Fully Qualified Class Name(FQCN)
//! \<NamespaceName>\(<SubNamespaceName>)*\<ClassName>

?>