<?php
class Conexion
{
    private $conn;

    public function __construct()
    {
        $pdo = "mysql:host=localhost;dbname=helpdesk;charset=utf8";
        try {
            $this->conn =  new PDO($pdo, 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conn;
    }
}
