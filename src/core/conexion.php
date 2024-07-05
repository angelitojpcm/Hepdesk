<?php

namespace Helpdesk\Core;

use PDO;
use PDOException;

class Conexion
{
    private $conn;

    public function __construct()
    {
        $pdo = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=" . $_ENV['DB_CHARSET'];
        try {
            $this->conn =  new PDO($pdo, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
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
