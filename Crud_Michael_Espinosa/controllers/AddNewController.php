<?php
include_once __DIR__ . '/../models/DatabaseConnection.php';

class AddNewController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnection();
    }

    public function addNewUser() {
        $conn = $this->dbConnection->getConnection();

        if (isset($_POST["submit"])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=New record created successfully");
                exit();
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }
    }
}

$addNewController = new AddNewController();
$addNewController->addNewUser();
