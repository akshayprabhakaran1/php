<?php
// 
// var_dump($_POST['id']);
require "classes/Database.php";
require "classes/Books.php";
require "classes/Pagenator.php";

$db = new Database();
$book = new Books();

$conn = $db -> getConn();

$t_heading = array();

$r = array();

$res = $book->search($conn, $_POST['id'], $_POST['term']);


if(isset($_POST['id'])) {
    
    $total_records = count($res[1]);
    $pagenator = new Pagenator($_POST['page'] ?? 1, 10, $total_records);
    $result = $book->search($conn, $_POST['id'], $_POST['term'], $pagenator -> limit, $pagenator -> offset);
    echo ($_POST['page']);
    
    
    foreach ($result[0] as $keys => $values) {
        array_push($t_heading, $values);
    }

?>

    <?= require "includes/table_body.php" ?>
    <script type="text/javascript" src="./js/index.js"></script>

<?php 
} else {
    echo "Didnt Got";
}
?>