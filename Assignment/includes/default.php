<?php

//! used to display the default page when no search input is provided

require "../classes/Database.php";
require "../classes/Books.php";
require "../classes/Pagenator.php";

$db = new Database();

$book = new Books();

$conn = $db -> getConn();

$total_records = $book -> getTotalRecords($conn);

$pagenator = new Pagenator($_GET['page'] ?? 1, 10, $total_records);

$result = $book -> getPages($conn, $pagenator -> limit, $pagenator -> offset, $_GET['order'] ?? "not", $_GET['type'] ?? "not");


if(isset($_POST['id'])) {

?>

    <?php require "../includes/table_body.php" ?>
    <script type="text/javascript" src="./js/index.js"></script>

<?php 

} else {

    echo "Didnt Got";

}

?>