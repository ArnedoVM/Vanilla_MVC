<?php
function requireLogin() {
    if (!isset($_SESSION['user_logged_in'])) {
        // Debugging line to check execution
        die('Redirecting to login...');

        // User is not logged in, store the current URL
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header('Location: /public/views/LogInPage.php');
        exit();
    }
}



?>