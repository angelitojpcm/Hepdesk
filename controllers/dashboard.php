<?php
class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'user' => $_SESSION['user'],
        ];

        $this->view->get($this, 'index', $data);
    }
}