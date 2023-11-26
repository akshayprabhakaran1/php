<?php

$url = "https://example.com";

$handle = curl_init();

curl_setopt($handle, CURLOPT_URL, $url);

//! return the value when the curl_exec() returns true
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

//! we can use single line to pass all the options
// curl_setopt_array($handle, [CURLOPT_RETURNTRANSFER]);

$content = curl_exec($handle);

//! to get info about the url
print_r(curl_getinfo($handle));

//! to get error
$error = curl_error($handle);

echo strlen($content);

//! no longer need to close because 
//! the curl_init() now returns the object rather than resource
// curl_close($handle);

// http_build_query();

?>