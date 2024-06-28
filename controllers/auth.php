<?php
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

        $data = $this->model->validate($email, $password);
        if ($data) {

            //Validamos 
            if ($password == $data['password']) {

                $_SESSION['user'] = $data;

                echo json_encode(['status' => 200, 'message' => 'Bienvenido']);
            } else {
                echo json_encode(['status' => 401, 'message' => 'Usuario o contraseña incorrectos']);
            }
        } else {
            echo json_encode(['status' => 401, 'message' => 'Usuario o contraseña incorrectos']);
        }
    }
}
