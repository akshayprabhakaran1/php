<?php

require "includes/database.php";

$conn = getDB();

$sql = "SELECT * FROM articles";

$results = mysqli_query($conn, $sql);


//! === is used to compare the false if we use == it
//! will return false for empty values of string and integer
//! as they represent 0
if ($results === false) {
    echo mysqli_error($conn);
} else {
    //! fetch_all() to fetch all rows at once
    //! fetch_row() to fetch a single row
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC); 
}

?>

<?php require 'includes/header.php' ?>

<a href="new-article.php">New article</a>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <article>
                    <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>
                    <p> <?= htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require 'includes/footer.php' ?>