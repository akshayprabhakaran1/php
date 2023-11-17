<?php
error_reporting( E_ALL );
ini_set('display_errors', '1');

class Database {
    public function getConn() {
        $db_host = "localhost";
        $db_name = "library";
        $db_user = "admin";
        $db_pass = "SQF[ZzT]NbUnc8K)";

        $dsn = "mysql:host=".$db_host.";dbname=".$db_name.";charset=utf8";

        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e -> getMessage();
            exit;
        }
    }
}