<?php
    //session_start(); // Ensure session start
    include('header.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>

    <!-- Search Form -->
    <form id="searchForm">
        <label for="search_term">Search by Student ID or Name:</label>
        <input type="text" id="search_term" name="search_term">
        <button type="submit">Search</button>
    </form>

    <div id="search_results">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php if (!empty($students)) : ?>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?= $student['Student_ID'] ?></td>
                        <td><?= $student['student_name'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['phone'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">No matching records found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
<!-- Include the external JavaScript file -->
<script src="/public/resources/js/scripts.js"></script>
</html>
