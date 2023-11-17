<?php

  /**
   * Get the article record on the ID
   * @param object $conn connection to database
   * @param integer $id of the article
   * @return mixed An associative array containg the article with ID, or null if not found
   */

function getArticle($conn, $id) {

    $sql = "SELECT *
            FROM articles
            WHERE id = :id";

    //! by using prepare we no longer need to check is_numeric()
    //! to avoid sql injecction

    $stmt = $conn -> prepare($sql);

    //! PDO::PARAM_INT define datatype of parameter
    $stmt -> bindValue(':id', $id, PDO::PARAM_INT);

    if ( $stmt -> execute() ) {

        //! to return an assosiative array
        //! returns false if not found
        return $stmt -> fetch(PDO::FETCH_ASSOC);
        // $result = mysqli_stmt_get_result($stmt);

        // return mysqli_fetch_array($result, MYSQLI_ASSOC);
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
function validateArticle($title, $content, $published_at) {

    $errors = [];
    
    if ($title == '') {
        $errors[] = 'Title is required';
    }

    if ($content == '') {
        $errors[] = 'Content is required';
    }

    if ($published_at == '') {

        //! to check weather the inserted value is of
        //! correct date format.
        $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);
        if ($date_time === false) {
            $errors[] = 'Ivalid date and time';
        } else {
            $date_errors = date_get_last_errors();
            if ($date_errors['warning_count'] > 0) {
                $errors[] = 'Invalid date and time';
            }
        }
    }
    return $errors;
}

?>