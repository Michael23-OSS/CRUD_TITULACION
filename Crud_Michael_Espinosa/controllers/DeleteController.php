<?php
include_once __DIR__ . '/../models/DatabaseConnection.php';

class DeleteController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnection();
    }

    public function deleteUser($id) {
        $conn = $this->dbConnection->getConnection();
        $sql = "DELETE FROM `crud` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=Data deleted successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}

$deleteController = new DeleteController();
$id = $_GET["id"];
$deleteController->deleteUser($id);
