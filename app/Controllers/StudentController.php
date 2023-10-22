<?php
    

    require_once(__DIR__.'/../Models/StudentModel.php');

    class StudentController {



        private $studentModel;

        public function __construct() {
            $this->studentModel = new StudentModel();
        }

        public function register() {
            require_once('./public/views/register.php');
        }


        public function create() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $result = $this->studentModel->createStudent($name, $email, $phone);
        
                if ($result) {
                    // Redirect back to the registration page with a success query parameter
                    header('Location: /register?success=1');
                    exit();
                } else {
                    echo 'Failed to create student';
                }
            }
        }
        
        public function listStudents() {
            // Check if the user is not logged in
            if (!isset($_SESSION['user_id'])) {
                header('Location: /public/views/LogInPage.php'); // Adjust the path as needed
                exit();
            }
            
        
            // Fetch all students
            $students = $this->studentModel->getAllStudents();
            require_once('./public/views/StudentList.php');
        }
        
        public function searchStudents() {
            // Check if the user is not logged in
            if (!isset($_SESSION['user_id'])) {
                header('Location: /public/views/LogInPage.php'); // Redirect to the login page
                exit();
            }
        
            // Handle the search logic as before
            if (isset($_POST['search_term'])) {
                $searchTerm = $_POST['search_term'];
                $students = $this->studentModel->searchStudents($searchTerm);
            } else {
                $students = $this->studentModel->getAllStudents();
            }
        
            require_once('./public/views/StudentList.php');
        }
        
        
        

        
        // public function listStudents() {
        //     $students = $this->studentModel->getStudents();
        //     // You may want to pass the $students data to a view.
        //     require_once('./public/views/StudentList.php');
        // }
        

    }

    

?>
