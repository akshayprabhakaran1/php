<?php 
error_reporting( E_ALL );
ini_set('display_errors', '1');

class Books {
    public function insert($conn, $books) {

        print_r($books['title']);
        $sql = "INSERT INTO books (
                    title,
                    author,
                    genre,
                    kind,
                    epoch,
                    url,
                    slug
                ) VALUES (
                    :title,
                    :author,
                    :genre,
                    :kind,
                    :epoch,
                    :url,
                    :slug
                )";

        try {
            $stmt = $conn -> prepare($sql);
        } catch (PDOException $e) { 
            print "". $e -> getMessage() ."";
        }

        // binding inserting Values
        $stmt -> bindValue(":title", $books["title"], PDO::PARAM_STR);
        $stmt -> bindValue(":author", $books["author"], PDO::PARAM_STR);
        $stmt -> bindValue(":genre", $books["genre"], PDO::PARAM_STR);
        $stmt -> bindValue(":kind", $books["kind"], PDO::PARAM_STR);
        $stmt -> bindValue(":epoch", $books["epoch"], PDO::PARAM_STR);
        $stmt -> bindValue(":url", $books["url"], PDO::PARAM_STR);
        $stmt -> bindValue(":slug", $books["slug"], PDO::PARAM_STR);
        
        $stmt -> execute();
    }
}