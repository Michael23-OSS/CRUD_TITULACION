<?php
include_once __DIR__ . '/../models/DatabaseConnection.php';

class EditController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnection();
    }

    public function editUser($id) {
        $conn = $this->dbConnection->getConnection();

        if (isset($_POST["submit"])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id = $id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php?msg=Data updated successfully");
                exit();
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }
    }

    public function getEditUserData($id) {
        $conn = $this->dbConnection->getConnection();
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }
}

$editController = new EditController();
$id = $_GET["id"];
$editController->editUser($id);
$userData = $editController->getEditUserData($id);
