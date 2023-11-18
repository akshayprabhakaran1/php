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

$result = $book -> getPages($conn, $pagenator -> limit, $pagenator -> offset);

$t_heading = array();

foreach ($result[0] as $keys => $values) {
    array_push($t_heading, $keys);
}

// print_r($t_heading);

?>

<?php require "includes/header.php"; ?>
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

    <nav>

        <!-- to disable the previous button if previous is none -->
        <?php if ($pagenator -> previous): ?>
            <a class="btn btn-primary" href="?page=<?= $pagenator -> previous ?>">Previous</a>
        <?php else: ?>
            <button class="btn btn-primary">Previous</button>
        <?php endif; ?>

        <!-- to display pages -->
        <?php for($i = 1; $i <= $pagenator -> total_pages; $i++): ?>
            <a class="btn" href="?page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>

        <!-- to disable the next button if next is none -->
        <?php if ($pagenator -> next): ?>
            <a class="btn btn-primary" href="?page=<?= $pagenator -> next ?>">Next</a>
        <?php else: ?>
            <button class="btn btn-primary">Next</button>
        <?php endif; ?>

    </nav>

<?php require "includes/footer.php"; ?>