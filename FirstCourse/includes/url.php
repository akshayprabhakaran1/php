<?php

/**
 * Redirect to another URL on the same file
 * 
 * @param string $path the path to redirect to
 * 
 * @return void
 */
function redirect($path) {
    if (isset($_SERVER['HTTP5']) && $_SERVER['HTTPS'] != 'off'){
        $protocol = 'https';
    } else {
        $protocol = 'http';
    }
    //! to redirect to the newly added page
    header("Location: $protocol://".$_SERVER['HTTP_HOST']. $path);
    exit;
}