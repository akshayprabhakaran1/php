<?php
// 
// var_dump($_POST['id']);
require "classes/Database.php";
require "classes/Books.php";

$db = new Database();
$book = new Books();

$conn = $db -> getConn();

$t_heading = array();

if(isset($_POST['id'])) {
    $result = $book->search($conn, $_POST['id'], $_POST['term']);

    // print_r($result[1]);

    foreach ($result[0] as $keys => $values) {
        array_push($t_heading, $values);
    } ?>
    <?php require "includes/table_body.php"; ?>
    <script type="text/javascript" src="./js/index.js"></script>
<?php } else {
    echo "Didnt Got";
}