<?php
class DatabaseConnection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "Michael64";
    private $dbname = "db_crud_espinosa";
    private $conn;

    // Constructor para establecer la conexión
    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar la conexión
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Obtener la conexión
    public function getConnection() {
        return $this->conn;
    }
}
