<?php
class AuthModel extends Query
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function validate($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $result = $this->selectby($sql, [
            ':email' => $email,
        ]);

        return $result;
    }
}
