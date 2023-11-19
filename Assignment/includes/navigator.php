<?php

// used by many file to provide the bottom pagination buttons
// dynamicaly update the number of pages between next and previous 
// while searching

require "../classes/Database.php";
require "../classes/Books.php";
require "../classes/Pagenator.php";

$db = new Database();

$book = new Books();

$conn = $db -> getConn();

$table_heading = array();

$res = $book->search($conn, $_POST['id'], $_POST['term']);

if(isset($_POST['id'])) {
    
    $total_records = count($res[1]);

    $pagenator = new Pagenator($_POST['page'] ?? 1, 10, $total_records);

    $result = $book->search($conn, $_POST['id'], $_POST['term'], $pagenator -> limit, $pagenator -> offset);
    
    // pushiing table values into the array
    foreach ($result[0] as $keys => $values) {

        array_push($table_heading, $values);

    }

?>

    <?php include "../includes/paginator.php" ?>

    // unless the jquery will not work at all
    <script type="text/javascript" src="./js/index.js"></script>

<?php 

} else {

    echo "Didnt Got";

}

?>