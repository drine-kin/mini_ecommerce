<?php

class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "ecommerce";

    public $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->conn->connect_error) {
            echo "Fail ".$this->conn->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    private function closeConnection() {
        if($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
