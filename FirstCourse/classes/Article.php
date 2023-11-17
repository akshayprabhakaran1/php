<?php
/**
 * Article
 * 
 * A piece of writing for publication
 */
class Article {

    public $id;
    public $title;
    public $content;
    public $published_at;

    public $errors = [];

    /**
     * Get all the article
     * 
     * @param object $conn connection to the database
     * 
     * @return array an associative array of all the article records
     */
    public static function getAll($conn) {
        $sql = "SELECT * FROM articles";

        $results = $conn -> query($sql);

        return $results -> fetchAll(PDO::FETCH_ASSOC);
    }


  /**
   * Get the article record on the ID
   * @param object $conn connection to database
   * @param integer $id of the article
   * @return mixed An object containg this class, or null if not found
   *   
   */

    public static function getByID($conn, $id, $colunms = '*') {

        $sql = "SELECT $colunms
                FROM articles
                WHERE id = :id";

        //! by using prepare we no longer need to check is_numeric()
        //! to avoid sql injecction

        $stmt = $conn -> prepare($sql);

        //! PDO::PARAM_INT define datatype of parameter
        $stmt -> bindValue(':id', $id, PDO::PARAM_INT);

        $stmt -> setFetchMode(PDO::FETCH_CLASS, 'Article');

        if ( $stmt -> execute() ) {

            //! to return an assosiative array
            //! returns false if not found
            return $stmt -> fetch();
            // $result = mysqli_stmt_get_result($stmt);

            // return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

    /**
     * Update the article with its current property values
     * 
     * @param object $conn connection to the database
     * 
     * @return boolean true if the update was successfull, false otherwise
     */
    public function update($conn) {
        if ($this -> validate()) {
            $sql = "UPDATE articles
                    SET title = :title,
                        content = :content,
                        published_at = :published_at
                    WHERE id = :id";
    
            $stmt = $conn -> prepare($sql);
    
            $stmt -> bindValue(':id', $this -> id, PDO::PARAM_INT);
            $stmt -> bindValue(':title', $this -> title, PDO::PARAM_STR);
            $stmt -> bindValue(':content', $this -> content, PDO::PARAM_STR);
    
            if ($this -> published_at == null) {
                $stmt -> bindValue(':published_at', null, PDO::PARAM_NULL);
            } else {
                $stmt -> bindValue(':published_at', $this -> published_at, PDO::PARAM_STR);
            }
    
            return $stmt -> execute();
        } else {
            return false;
        }
    }

    /**
    * Summary of validateArticle
    * @param string $title
    * @param string $content
    * @param string $published_at
    * 
    * @return array of error msg if any
    */
    protected function validate() {
    
        if ($this -> title == '') {
            $this -> errors[] = 'Title is required';
        }

        if ($this -> content == '') {
            $this -> errors[] = 'Content is required';
        }

        if ($this -> published_at == '') {

            //! to check weather the inserted value is of
            //! correct date format.
            $date_time = date_create_from_format('Y-m-d H:i:s', $this -> published_at);
            if ($date_time === false) {
                $this -> errors[] = 'Ivalid date and time';
            } else {
                $date_errors = date_get_last_errors();
                if ($date_errors['warning_count'] > 0) {
                    $this -> errors[] = 'Invalid date and time';
                }
            }
        }
        return empty($this -> errors);
    }

    /**
     * Update the article with its current property values
     * 
     * @param object $conn connection to the database
     * 
     * @return boolean true if the update was successfull, false otherwise
     */
    public function create($conn) {
        if ($this -> validate()) {
            $sql = "INSERT articles(title, content, published_at)
                    VALUES (:title, :content, :published_at)";
    
            $stmt = $conn -> prepare($sql);
    
            $stmt -> bindValue(':title', $this -> title, PDO::PARAM_STR);
            $stmt -> bindValue(':content', $this -> content, PDO::PARAM_STR);
    
            if ($this -> published_at == null) {
                $stmt -> bindValue(':published_at', null, PDO::PARAM_NULL);
            } else {
                $stmt -> bindValue(':published_at', $this -> published_at, PDO::PARAM_STR);
            }
    
            return $stmt -> execute();
        } else {
            return false;
        }
    }
}