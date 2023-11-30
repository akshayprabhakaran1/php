<?php

//! create the file in append mode
//! if file doesnt exist then the file will be created
// $handler = fopen("append.txt","r+");
// fwrite($handler, "aks\n");

//! to copy a file
// copy("akshay.txt","copy.txt");

//! to change the group of file
// chgrp("copy.txt","admin");

//! to change the mode of file
// Read and write for owner, nothing for everybody else: 0600
// Read and write for owner, read for everybody else: 0644
// Everything for owner, read and execute for everybody else: 0755
// Everything for owner, read for owner's group: 0740
// chmod("copy.txt", 0740);

//! to delete a file
// unlink("copy.txt");

//! directory name of current file
// echo dirname(__FILE__);

//! returns true or false when the end of file is reached
// var_dump(feof($handler));

//! to get the first charecter of the file
// echo fgetc($handler);

//! convert file contents into array
// print_r(file("append.txt"));

//! returns file size
// echo filesize("append.txt");

//! to lock and release a file
// exclusive lock
// flock($handler, LOCK_EX);
// release lock
// flock($file,LOCK_UN);

//! to move the file pointer
//0 move the file to begining
// fseek($handler,0);

//! to write to a file
// append the text to the begining of the file
// fwrite($handler,"akshay");

//! to get info about open file
// print_r(fstat($handler));

//! to rename file or dir
// rename("append.txt","picture.txt");