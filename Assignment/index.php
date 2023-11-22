<?php
error_reporting( E_ALL );
ini_set('display_errors', '1');

require "classes/Database.php";
require "classes/Books.php";
require "classes/Pagenator.php";

$book = new Books();
$db = new Database();

$conn = $db -> getConn();

//! to get total number of records
$total_records = $book -> getTotalRecords($conn);
$pagenator = new Pagenator($_GET['page'] ?? 1, 10, $total_records);
$result = $book -> getPages($conn, $pagenator -> limit, $pagenator -> offset, $_GET['order'] ?? "not", $_GET['type'] ?? "not");
$table_heading = array();

foreach ($result[0] as $keys => $values) {

    array_push($table_heading, $values);
}

?>

<?php include "includes/header.php"; ?>
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
        <?php include "includes/paginator.php"; ?>
    </div>
<?php include "includes/footer.php"; ?>