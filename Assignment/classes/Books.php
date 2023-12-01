<?php 
// error_reporting( E_ALL );
// ini_set('display_errors', '1');

/**
 * To access the book database and do insertion, geting count, etc
 */
class Books {

    /**
     * Summary of insert
     * To insert the book datas comming from the api to the db
     * @param object $conn db object for connecting to db
     * @param array $books used to get books details from the api
     * @return boolean
     */
    public function insert($conn, $books): bool {

        $dateTime = new DateTime();
        $dateTime -> setTimezone(new DateTimeZone("Asia/Kolkata"));

        $sql = "INSERT INTO books (
                    title,
                    author,
                    genre,
                    kind,
                    epoch,
                    url,
                    slug,
                    created_at,
                    modified_at
                ) VALUES (
                    :title,
                    :author,
                    :genre,
                    :kind,
                    :epoch,
                    :url,
                    :slug,
                    :created_at,
                    :modified_at
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
            $stmt -> bindValue(":created_at", $dateTime -> format("Y-m-d H:i:s"), PDO::PARAM_STR);
            $stmt -> bindValue(":modified_at", $dateTime -> format("Y-m-d H:i:s"), PDO::PARAM_STR);
            
            $stmt -> execute();

            return true;

        } catch (PDOException $e) { 
            // echo "<pre>". $e -> getMessage() ."</pre>";
            // echo "<pre><h1>Insertion Failed<h1></pre>";
            return false;
        }

        // binding inserting Values
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

        if (!isset($column)) {
            
            $sql = "SELECT
                    id,
                    title,
                    author,
                    genre,
                    kind,
                    epoch,
                    url,
                    slug
                FROM books
                LIMIT :limit
                OFFSET :offset";

        } else {

            $sql = "SELECT
                    id,
                    title,
                    author,
                    genre,
                    kind,
                    epoch,
                    url,
                    slug
                FROM books
                ORDER BY $column 
                $order
                LIMIT :limit
                OFFSET :offset";
        }

        $stmt = $conn -> prepare($sql);

        $stmt -> bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt -> bindValue(":offset", $offset, PDO::PARAM_INT); 

        try {

            $stmt -> execute();

            //! to get only column headings
            array_push($result, $conn -> query("DESCRIBE books") -> fetchAll(PDO::FETCH_COLUMN));
            array_push($result, $stmt -> fetchAll(PDO::FETCH_ASSOC));
            return $result;

        } catch (PDOException $e) {
            // echo "<pre>". $e -> getMessage() ."</pre>";
            return null;
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

        try {
            return $conn -> query($sql) -> fetchColumn();
        } catch (PDOException $e) {
            // echo "<pre>". $e -> getMessage() ."</pre>";
            return null;
        }


    }

    /**
     * Summary of search
     * Used for filtering the string given like search
     * @param object $conn db object for connecting to db
     * @param string $column based on with column the record should sort
     * @param mixed $term based on which the records are searched
     * @param integer $limit limit of the record to get
     * @param integer $offset offset of the record to get
     * @return mixed found records
     */
    public function search($conn, $term = [], $limit = null, $offset = null) {

        $result = array();

        $str = [];

        if (!empty($term) && is_array($term)) {
            foreach($term as $keys => $values){
                if ($values != '%%'){
                    array_push($str, "$keys LIKE '$values'");
                }
            }
        }

        $sql = "SELECT id, title, author, genre, kind, epoch, url, slug FROM books ";
        
        if ($limit == null) {

             // for setting pagination
            $sql .= !empty($str) ? " WHERE ".implode(" AND ", $str) .";" : ";";
            $stmt = $conn -> prepare($sql);

        } else {

            // for getting search result
            $sql .= !empty($str) ? " WHERE ".implode(" AND ", $str) . " LIMIT :limit OFFSET :offset;" : " LIMIT :limit OFFSET :offset;";
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(":limit", $limit, PDO::PARAM_INT);
            $stmt -> bindValue(":offset", $offset, PDO::PARAM_INT); 
        }

        try {

            $stmt -> execute();
            array_push($result, $conn->query("DESCRIBE books") -> fetchAll(PDO::FETCH_COLUMN));
            array_push($result, $stmt -> fetchAll(PDO::FETCH_ASSOC));
            return $result;

        } catch (PDOException $e) {
            echo "<pre>". $e -> getMessage() ."</pre>";
            return null;
        }
    }

}