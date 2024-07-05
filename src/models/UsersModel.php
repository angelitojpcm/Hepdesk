<?php

namespace Helpdesk\Models;

use Helpdesk\Core\Query;

class UsersModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $sql = "SELECT * FROM users";
        return $this->select($sql);
    }
}
