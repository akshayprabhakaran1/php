<?php
error_reporting( E_ALL );
ini_set('display_errors', '1');

/**
 * Summary of Database
 * Classes to provide connection to the database
 */
class Database {
    /**
     * Summary of getConn
     * Used to provide the connection object
     * @return PDO connection object
     */
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