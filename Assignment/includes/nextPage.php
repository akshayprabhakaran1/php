<?php

require "../classes/Database.php";
require "../classes/Books.php";
require "../classes/Pagenator.php";

$db = new Database();

$book = new Books();

$conn = $db -> getConn();

$table_heading = array();

$res = $book->search($conn, $_POST['table_attr'], $_POST['search_term']);

if(isset($_POST['table_attr'])) {
    
    $total_records = count($res[1]);

    $pagenator = new Pagenator($_POST['page'] ?? 1, 10, $total_records);

    $result = $book -> search($conn, $_POST['table_attr'], $_POST['search_term'], $pagenator -> limit, $pagenator -> offset);
    
    foreach ($result[0] as $keys => $values) {

        array_push($table_heading, $values);

    }

?>

    <?php include "../includes/table_body.php" ?>

    <script type="text/javascript" src="./js/index.js"></script>

<?php 

} else {

    echo "Didnt Got";

}

?>