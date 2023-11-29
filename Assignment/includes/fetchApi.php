<?php

// error_reporting( E_ALL );
// ini_set('display_errors', '1');

require "../classes/Database.php";
require "../classes/Books.php";

$book = new Books();
$db = new Database();

$conn = $db -> getConn();

/**
 * Summary of fetchAPI
 * Used to fetch info from a given url 
 * @param string $url url of the api
 * @return mixed result of the api
 */
function fetchAPI($url) {

    $handler = curl_init();
    curl_setopt($handler, CURLOPT_URL,$url);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($handler);

    if ($e = curl_error($handler)) {
        echo "". $e;    
    } else {
        $decoded = json_decode($result, true);
        return $decoded;
    }

    curl_close($handler);
}

$data = fetchAPI("https://wolnelektury.pl/api/books/"); 

//! to insert 100 records from the api result
for ($i = 0; $i <= 99; $i++) {
    $result = $book -> insert($conn, $data[$i]);
}

if ($result) {
    echo "<pre>
            <h1>Insertion was successfull!</h1>
        </pre>";
} else {
    echo "<pre>
            <h1>Insertion was failed!</h1>
        </pre>";
}

?>
