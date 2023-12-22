<?php
include_once __DIR__ . '/../models/DatabaseConnection.php';

class IndexController {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new DatabaseConnection();
    }

    public function renderView() {
        $conn = $this->dbConnection->getConnection();

        include_once __DIR__ . '/../views/index_view.php';
    }
}

$indexController = new IndexController();
$indexController->renderView();
