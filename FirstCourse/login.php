<?php

require 'includes/url.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo'Hi';
    if ($_POST['username'] == 'dave' && $_POST['password'] == 'secret') {
        echo'Hi';
        //! to prevent session fixation
        //! this function destroy the old session and create a new one
        //! only session id is changed
        $_SESSION['is_logged_in'] = true;
        session_regenerate_id(true);
        redirect('/FirstCourse');

    } else {
        $error = 'incorrect login';
    }
}

?>

<?php require 'includes/header.php' ?>

<h2>Login</h2>

<?php if (!empty($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">

    <div>
        <label for="username">Username</label>
        <input name="username" id="username">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Log In</button>

</form>

<?php require 'includes/footer.php' ?>