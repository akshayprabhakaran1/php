<?php

// error_reporting( E_ALL );
// ini_set('display_errors', '1');

require "classes/Database.php";
require "classes/Books.php";
require "classes/Pagenator.php";

$db = new Database();
$book = new Books();

$conn = $db -> getConn();

$table_heading = array();

$res = $book -> search($conn, $_POST['search_term'] ?? [], $_POST['sort'] ?? []);
$total_records = count($res[1]);
$pagenator = new Pagenator($_POST['page'] ?? 1, 10, $total_records);
$page = ["limit" => $pagenator->limit, "offset" => $pagenator->offset];
$result = $book -> search($conn, $_POST['search_term'] ?? [], $_POST['sort'] ?? [], $page);


array_splice($result[0], -3);
foreach ($result[0] as $keys => $values) {
    array_push($table_heading, $values);
}

?>

<?php
    $json = [];
    header('Content-Type: application/json');
    $json['navigation'] = json_encode($pagenator);
    $json['result'] = json_encode($result);
    echo json_encode($json);
?>