<?php
class Views
{

    public function get($page, $view, $data = [])
    {
        $controller = get_class($page);
        $path = 'views/' . $controller . '/' . $view . '.php';

        if (file_exists($path)) {
            require_once 'views/layouts/head.php';
            require $path;
            require_once 'views/layouts/footer.php';
        } else {
            die("Vista no encontrada");
        }
    }
}
