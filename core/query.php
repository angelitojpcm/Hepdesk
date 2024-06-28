<?php
class Query extends Conexion
{
    protected $table;
    private $pdo, $conn, $sql, $data;

    public function __construct()
    {
        $this->pdo = new Conexion();
        $this->conn = $this->pdo->connect();
    }

    public function select(string $sql)
    {
        $this->sql = $sql;
        $result = $this->conn->prepare($this->sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectby(string $sql, $data)
    {
        $this->sql = $sql;

        //Enlazar usando bidParam
        $result = $this->conn->prepare($this->sql);

        foreach ($data as $key => $value) {
            $result->bindParam($key, $value);
        }

        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(string $sql, array $data)
    {
        $this->sql = $sql;
        $this->data = $data;
        $insert = $this->conn->prepare($this->sql);
        $data = $insert->execute($this->data);

        if ($data) {
            $res = $this->conn->lastInsertId();
        } else {
            $res = 0;
        }

        return $res;
    }
}
