<?php
// require_once('../config/db_config.php');
require_once('./config/db_config.php');

class StudentModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function createStudent($name, $email, $phone) {
        $sql = "INSERT INTO students (student_name, email, phone) VALUES ('$name', '$email', '$phone')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getStudents() {
        $sql = "SELECT * FROM students";
        $result = mysqli_query($this->conn, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $students;
    }

    public function getStudentById($student_id) {
        $sql = "SELECT * FROM students WHERE student_id = '$student_id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function getAllStudents() {
        $sql = "SELECT * FROM students";
        
        $result = mysqli_query($this->conn, $sql);
        $students = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    
        return $students;
    }
    
    public function searchStudents($searchTerm) {
        $searchTerm = trim($searchTerm);
    
        // Check if the search term is a numeric value (likely a Student_ID)
        if (is_numeric($searchTerm)) {
            $sql = "SELECT * FROM students WHERE `Student_ID` = '$searchTerm'";
        } else {
            // If it's not a numeric value, perform a partial search by name
            $searchTerm = '%' . $searchTerm . '%'; // Add wildcards for searching by name
            $sql = "SELECT * FROM students WHERE `Student_ID` LIKE '$searchTerm' OR student_name LIKE '$searchTerm'";
        }
    
        $result = mysqli_query($this->conn, $sql);
        $students = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    
        return $students;
    }
    
    public function updateStudent($student_id, $name, $email, $phone) {
        $sql = "UPDATE students SET name = '$name', email = '$email', phone = '$phone' WHERE student_id = '$student_id'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}

?>