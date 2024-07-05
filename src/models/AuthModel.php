<?php
namespace Helpdesk\Models;

use Helpdesk\Core\Query;

class AuthModel extends Query
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function validate($email, )
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $result = $this->selectby($sql, [
            ':email' => $email,
        ]);

        return $result;
    }
}
