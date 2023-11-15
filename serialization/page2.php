<?php

include ("objectSerial.php");

$s = file_get_contents("store.txt");

$stuObj = unserialize($s);

$stuObj -> printStudentInfo();