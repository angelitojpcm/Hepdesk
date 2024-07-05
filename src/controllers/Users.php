<?php

namespace Helpdesk\Controllers;

use Helpdesk\Core\Controller;

class Users extends Controller
{
    public function list()
    {
        $users = $this->model->list();

        $this->view->get($this, 'list', ['users' => $users]);
    }
}
