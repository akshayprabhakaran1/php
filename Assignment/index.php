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

if (isset($_POST['id'])) {
    echo $_POST['id'];
    echo "HaI";
} else {
    echo 'll';
    // echo $_POST['term'];
}

$result = $book -> getPages($conn, $pagenator -> limit, $pagenator -> offset, $_GET['order'] ?? "not", $_GET['type'] ?? "not");

$t_heading = array();

foreach ($result[0] as $keys => $values) {
    array_push($t_heading, $values);
}

// print_r($t_heading);

?>

<?php require "includes/header.php"; ?>
    <div class="main">
        <h1 style="text-align: center">Table Of Books</h1>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <?php require "includes/table_heading.php"; ?>
                </thead>
                <tbody>
                    <?php require "includes/table_body.php"; ?>
                </tbody>
            </table>
            <?php require "includes/paginator.php"; ?>
    </div>
<?php require "includes/footer.php"; ?>