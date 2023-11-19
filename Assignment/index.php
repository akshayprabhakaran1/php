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
}

$result = $book -> getPages($conn, $pagenator -> limit, $pagenator -> offset, $_GET['order'] ?? "not", $_GET['type'] ?? "not");

$t_heading = array();

foreach ($result[0] as $keys => $values) {
    array_push($t_heading, $keys);
}

// print_r($t_heading);

?>

<?php require "includes/header.php"; ?>
    <div class="d-flex flex-column align-items-center justify-content-center m-3">
        <h1 style="text-align: center">Table Of Books</h1>
        <div class="result-table">
            <?php require "includes/table.php"; ?>
        </div>
        
    <nav class="justify-content-center">

        <!-- to disable the previous button if previous is none -->
        <?php if ($pagenator -> previous): ?>
            <a 
                class="btn btn-primary" 
                href="<?= isset($_GET['order']) ? "?page=".$pagenator -> previous."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$pagenator -> previous ?>"
            >
                Previous
            </a>
        <?php else: ?>
            <a class="btn btn-primary disabled" href="#">Previous</a>
        <?php endif; ?>

        <!-- to display pages -->
        <?php for($i = 1; $i <= $pagenator -> total_pages; $i++): ?>
            <a 
                class="btn" 
                href="<?= isset($_GET['order']) ? "?page=".$i."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$i ?>"
            >
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <!-- to disable the next button if next is none -->
        <?php if ($pagenator -> next): ?>
            <a 
                class="btn btn-primary" 
                href="<?= isset($_GET['order']) ? "?page=".$pagenator -> next."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$pagenator -> next ?>"
            >
                Next
            </a>
        <?php else: ?>
            <a class="btn btn-primary disabled" href="#">Next</a>
        <?php endif; ?>

    </nav>
    </div>
<?php require "includes/footer.php"; ?>