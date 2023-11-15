<?php

require "includes/database.php";
require "includes/article.php";

$conn = getDB();
//! $_GET[] is used to get the url strings
//! after the ? as a key value pair in the form 
//! of a array

//! to avoid some what of sql injection
//! not completely
//! isset is used to check if the value is set or not
if ( isset($_GET['id']) ) {
    // $sql = "SELECT * 
    //         FROM articles 
    //         WHERE id = " . $_GET['id'];
    
    // $results = mysqli_query($conn, $sql);
    
    
    // //! === is used to compare the false if we use == it
    // //! will return false for empty values of string and integer
    // //! as they represent 0
    // if ($results === false) {
    //     echo mysqli_error($conn);
    // } else {
    //     //! fetch_all() to fetch all rows at once
    //     //! fetch_assoc() to fetch a single row
    //     //! returns null if no row found
    //     $article = mysqli_fetch_assoc($results); 
    // }

    $article = getArticle($conn, $_GET['id']);

} else {
    $article = null;
}


?>

<?php require 'includes/header.php' ?>

<?php if ($article === null): ?>
    <p>No articles found.</p>
<?php else: ?>
    <article>
        <h2><?= htmlspecialchars($article['title']); ?></h2>
        <p> <?= htmlspecialchars($article['content']); ?></p>
    </article>

    <a href="edit-article.php?id=<?= $article['id'] ?>">Edit</a>

<?php endif; ?>

<?php require 'includes/footer.php' ?>