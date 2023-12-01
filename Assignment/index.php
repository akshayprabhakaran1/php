<?php

// error_reporting( E_ALL );
// ini_set('display_errors', '1');

include "includes/header.php";

require "classes/Database.php";
require "classes/Books.php";
require "classes/Pagenator.php";

$book = new Books();
$db = new Database();

$conn = $db -> getConn();

$table_heading = array();

// to get total number of records
$total_records = $book -> getTotalRecords($conn);
$pagenator = new Pagenator($_GET['page'] ?? 1, 10, $total_records);
$result = $book -> getPages(
    $conn, 
    $pagenator -> limit, 
    $pagenator -> offset, 
    $_GET['order'] ?? null, 
    $_GET['type'] ?? null
);

if (isset($result)) {

    // to remove the last three columns(created_at..)
    array_splice($result[0], -3);
    foreach ($result[0] as $keys => $values) {
        array_push($table_heading, $values);
    }
    
} else {

    echo "<pre class='d-flex align-items-center justify-content-center vh-100'>
            <h1>Table Not Found!</h1>
        </pre>";
    exit;
}

?>


    <div class="main">
        <h1 style="text-align: center">Table Of Books</h1>
            <h2>Total No: of Records: <?= $total_records; ?></h2>
            <table 
                class="
                    table 
                    table-striped 
                    table-bordered 
                    table-hover 
                    rounded-3 
                    overflow-hidden"
                >
                <thead class="table-dark">
                    <?php include "includes/table_heading.php"; ?>
                </thead>
                <tbody>
                    <?php include "includes/table_body.php"; ?>
                </tbody>
            </table>
            <div id="pagination">
            </div>
    </div>
<?php include "includes/footer.php"; ?>