<?php
error_reporting( E_ALL );
ini_set('display_errors', '1');

require "classes/Database.php";
require "classes/Books.php";

$book = new Books();
$db = new Database();
$conn = $db -> getConn();

function fetchAPI($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

    $result = curl_exec($ch);

    if ($e = curl_error($ch)) {
        echo "". $e;    
    } else {
        $decoded = json_decode($result, true);
        return $decoded;
    }
    curl_close($ch);
}

$data = fetchAPI("https://wolnelektury.pl/api/books/"); 

// print_r($data[0]);

for ($i = 0; $i <= 99; $i++) {
    $book -> insert($conn, $data[$i]);
}

?>
