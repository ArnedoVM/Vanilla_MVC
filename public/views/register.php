<?php
session_start(); // Ensure session start
include('header.php');


// Check if the success query parameter is set
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<p class="success-notification">Student record added successfully!</p>';
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h1>Student Registration</h1>

    <form action="/create" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <button type="submit">Register</button>
    </form>

    <hr>
</body>
</html>
