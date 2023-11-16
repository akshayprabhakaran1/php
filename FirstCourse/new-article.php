<?php

require "includes/database.php";
require "includes/article.php";
require "includes/url.php";
require "includes/auth.php";

session_start();


if (!isLoggedIn()) {
    die ('unauthorised');
}

$title = '';
$content = '';
$published_at = '';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

    $errors = validateArticle($title, $content, $published_at);

    if (empty($errors)) {
        $conn = getDB();
        //! mysqli_escape_string() is used to avoid
        //! sql injection by treating escape characher into
        //! consideration and add \ to it.
        //! to overcome this ? is used as a placeholder
        $sql = "INSERT INTO articles(title, content, published_at)
                VALUES (?, ?, ?)";
    
        //! prepare the query
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
    
            if ($published_at == '') {
                $published_at = null;
            }
            //! s for string all the incoming values are string
            //! i for integer and so on
            //! 3 placeholder values so three s
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);
            
            if (mysqli_stmt_execute($stmt)) {
                //! return the id back
                $id = mysqli_insert_id($conn);

                redirect("/php/FirstCourse/article.php?id=$id");
                
                // echo "Inserted record with ID:".$id;
            } else {
                echo mysqli_stmt_error($stmt);
            }
    
        }
    }


}

?>

<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php require 'includes/article-form.php' ?>

<?php require 'includes/footer.php'; ?>