<?php

namespace Helpdesk\Controllers;

use Helpdesk\Core\Controller;

class Auth extends Controller
{
    public function login()
    {
        $this->view->get($this, 'login');
    }

    public function validate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = $this->model->validate($email);

        if ($data) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $data;
                echo json_encode(['status' => 200, 'message' => 'Usuario autenticado']);
            } else {
                echo json_encode(['status' => 401, 'message' => 'Usuario o contraseña incorrectos']);
            }
        } else {
            echo json_encode(['status' => 401, 'message' => 'Usuario o contraseña incorrectos']);
        }
    }
}
