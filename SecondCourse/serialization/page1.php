<?php

include ("objectSerial.php");

$stuObj = new Student;
$stuObj -> name = "Tim";
$stuObj -> id = 10;
$stuObj -> address = "abc";
$stuObj -> age = 20;

$s = serialize($stuObj);

echo $s;

//! store the serialized object in some file where page2.php can find it.
file_put_contents("store.txt", $s);
