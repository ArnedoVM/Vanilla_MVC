<?php

class HomeController {

    public function viewHomePage() {
        // Display the home page
        // require_once('./public/views/HomePage.php');
        if (!isset($_SESSION['user_id'])) {
            header('Location: /public/views/LogInPage.php'); // Adjust the path as needed
            exit();
        }
        
        header('./public/views/HomePage.php');
    }
}
