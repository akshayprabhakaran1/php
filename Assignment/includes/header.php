<!-- header section of the index.php page -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/index.js"></script>
<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"
>
<!-- Option 1: Include in HTML -->
<link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
>
<link href="./css/index.css?v=1.0" rel="stylesheet" type="text/css" />
<title>Books</title>

<?php

// error_reporting( E_ALL );
// ini_set('display_errors', '1');

require "classes/Database.php";
require "classes/Books.php";
require "classes/Pagenator.php";

$book = new Books();
$db = new Database();

$conn = $db -> getConn();

$table_heading = array();

// to get total number of records
$total_records = $book -> getTotalRecords( $conn );
$result = $book -> getHeadings( $conn );

if (isset($result)) {
// to remove the last three columns(created_at..)
    array_splice($result, -3);
    foreach ($result as $keys => $values) {
        array_push($table_heading, $values);
    }   
} else {
    echo "<pre class='d-flex align-items-center justify-content-center vh-100'>
            <h1>Table Not Found!</h1>
            </pre>";
    exit;
}

?>