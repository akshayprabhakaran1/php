<?php

require "includes/database.php";

$errors = [];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_at = $_POST['published_at'];

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

                //! to chech the header of the url
                if (isset($_SERVER['HTTP5']) && $_SERVER['HTTPS'] != 'off'){
                    $protocol = 'https';
                } else {
                    $protocol = 'http';
                }
                //! to redirect to the newly added page
                header("Location: $protocol://".$_SERVER['HTTP_HOST']."/article.php?id=$id");
                exit;
                // echo "Inserted record with ID:".$id;
            } else {
                echo mysqli_stmt_error($stmt);
            }
    
        }
    }


}

?>

<?php require 'includes/header.php'; ?>

<?php if(!empty($errors)): ?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h2>New article</h2>

<form method="post">

    <div>
        <label for="title">Title</label>
        <input name="title" id="title" placeholder="Article title" value="<?= htmlspecialchars($title); ?>">
    </div>

    <div>
        <label for="content">Title</label>
        <textarea name="content" id="content" row="4" cols="40" placeholder="Article content" value="<?= htmlspecialchars($content); ?>"></textarea>
    </div>

    <div>
        <label for="published_at">Title</label>
        <input name="published_at" id="published_at" type="datetime-local" value="<?= htmlspecialchars($published_at); ?>">
    </div>

    <button>Add</button>

</form>

<?php require 'includes/footer.php'; ?>