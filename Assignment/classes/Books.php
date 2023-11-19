<?php 
error_reporting( E_ALL );
ini_set('display_errors', '1');

/**
 * To access the book database and do insertion, geting count, etc
 */
class Books {

    /**
     * Summary of insert
     * To insert the book datas comming from the api to the db
     * @param object $conn db object for connecting to db
     * @param array $books used to get books details from the api
     * @return void
     */
    public function insert($conn, $books) {

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
            
            $stmt -> bindValue(":title", $books["title"], PDO::PARAM_STR);
            $stmt -> bindValue(":author", $books["author"], PDO::PARAM_STR);
            $stmt -> bindValue(":genre", $books["genre"], PDO::PARAM_STR);
            $stmt -> bindValue(":kind", $books["kind"], PDO::PARAM_STR);
            $stmt -> bindValue(":epoch", $books["epoch"], PDO::PARAM_STR);
            $stmt -> bindValue(":url", $books["url"], PDO::PARAM_STR);
            $stmt -> bindValue(":slug", $books["slug"], PDO::PARAM_STR);
            
            $stmt -> execute();
        } catch (PDOException $e) { 
            print "". $e -> getMessage() ."";
        }

        // binding inserting Values
    }

    /**
     * Summary of getAllBooks
     * To get all books details from the db
     * @param object $conn db object for connecting to db
     * @return mixed of all books details
     */
    public function getAllBooks($conn) {

        $sql = "SELECT *
                FROM books";
        
        $stmt = $conn -> prepare($sql);

        if ( $stmt -> execute() ) {

            //! to return an assosiative array
            //! returns false if not found
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

    /**
     * Summary of getPages
     * Funtion mainly used for pagenation used to get records based on limit and offset
     * @param object $conn db object for connecting to db
     * @param integer $limit limit of the record to get
     * @param integer $offset offset of the record to get
     * @param string $column based on with column the record should sort 
     * @param string $order how to sort assending or decending 
     * @return mixed getting seperate column referance and books data
     */
    public function getPages($conn, $limit, $offset, $column, $order) {

        $result = array();

        if ($column == "not") {
            
            $sql = "SELECT *
                FROM books
                LIMIT :limit
                OFFSET :offset";

        } else {

            $sql = "SELECT *
                FROM books
                ORDER BY $column 
                $order
                LIMIT :limit
                OFFSET :offset";
        }

        $stmt = $conn -> prepare($sql);

        $stmt -> bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt -> bindValue(":offset", $offset, PDO::PARAM_INT); 

        if ( $stmt -> execute() ) {

            //! to get only column headings
            $r=$conn -> query("DESCRIBE books") -> fetchAll(PDO::FETCH_COLUMN);

            array_push($result, $r);
            
            array_push($result, $stmt -> fetchAll(PDO::FETCH_ASSOC));
            
            return $result;
        }

    }

    /**
     * Summary of getTotalRecords
     * To get the count of the total records
     * @param object $conn db object for connecting to db
     * @return mixed total number of records
     */
    public function getTotalRecords($conn) {

        $sql = "SELECT COUNT(*)
                FROM books";

        return $conn -> query($sql) -> fetchColumn();

    }

    /**
     * Summary of search
     * Used for filtering the string given like search
     * @param object $conn db object for connecting to db
     * @param string $column based on with column the record should sort
     * @param string $term based on which the records are searched
     * @param integer $limit limit of the record to get
     * @param integer $offset offset of the record to get
     * @return mixed found records
     */
    public function search($conn, $column, $term, $limit = null, $offset = null) {

        if ($limit == null) {
            $term = $term . '%';
    
            $sql = "SELECT *
                    FROM books
                    WHERE $column LIKE '$term'";
    
            $stmt = $conn -> prepare($sql);
    
            if ( $stmt -> execute() ) {
                $result = array();
                $r=$conn->query("DESCRIBE books") -> fetchAll(PDO::FETCH_COLUMN);
                array_push($result, $r);
                array_push($result, $stmt -> fetchAll(PDO::FETCH_ASSOC));
                return $result;
            }
        } else {
            $term = $term . '%';
    
            $sql = "SELECT *
                    FROM books
                    WHERE $column LIKE '$term'
                    LIMIT :limit
                    OFFSET :offset";
    
            $stmt = $conn -> prepare($sql);
    
    
            $stmt -> bindValue(":limit", $limit, PDO::PARAM_INT);
            $stmt -> bindValue(":offset", $offset, PDO::PARAM_INT); 
    
    
            if ( $stmt -> execute() ) {
                $result = array();
                $r=$conn->query("DESCRIBE books")->fetchAll(PDO::FETCH_COLUMN);
                array_push($result, $r);
                array_push($result, $stmt->fetchAll(PDO::FETCH_ASSOC));
                return $result;
            } else {
                print_r("Unable to fetch the data");
            }
        }

    }

}