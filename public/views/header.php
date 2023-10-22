<!DOCTYPE html>
<html>
<head>
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="/public/resources/css/styles.css">
</head>
<body>
    <!-- Common header content -->
    <div class="header">
        <h1>Your Website</h1>
        <?php
        if (isset($_SESSION['user_id'])) {
            $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            echo "<p>Welcome, $username</p>";
            echo '<a href="/public/views/LogInPage.php">Logout</a>';
        } else {
            echo '<a href="/public/views/LogInPage.php">Login</a>';
        }
        ?>
    </div>
    <div class="navbar">
        <a href="#" data-route="/list">Student List</a>
        <a href="/public/views/register.php">Register</a>
    </div>

    <script src="/public/resources/js/scripts.js"></script>
</body>
</html>
