<?php
error_reporting( E_ALL );
ini_set('display_errors', '1');

require "classes/Database.php";
require "classes/Books.php";

$book = new Books();
$db = new Database();
$conn = $db -> getConn();

$result = $book -> getBooks($conn);

$t_heading = array();

foreach ($result[0] as $keys => $values) {
    array_push($t_heading, $keys);
}

// print_r($t_heading);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous"
    >
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center">Table Of Books</h1>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <?php foreach($t_heading as $heading): ?>
                <th> <?= $heading ?> </th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($result as $des): ?>
           <tr>
             <?php foreach($des as $d): ?>
                <th> <?= $d ?> </th>
            <?php endforeach; ?>
           </tr>
        <?php endforeach; ?>
    </table>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
</body>
</html>
