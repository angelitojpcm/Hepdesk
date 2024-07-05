<?php

namespace Helpdesk\Core;

class Views
{
    //Atributo que almacena la ruta
    protected $url;

    public function __construct($url)
    {
        //Asignamos la ruta
        $this->url = $url;
    }

    public function get($page, $view, $data = [])
    {
        $controller = get_class($page);
        $controller = str_replace('Helpdesk\Controllers\\', '', $controller);
        $directory = __DIR__ . '/../../src/';
        $path = $directory . 'views/' . $controller . '/' . $view . '.php';

        $data['url'] = $this->url;

        if (file_exists($path)) {
            extract($data);
            require_once $directory . 'views/layouts/head.php';
            if (Session::get('user')) {
                require_once $directory . 'views/layouts/header.php';
                require_once $directory . 'views/layouts/sidebar.php';
            }

            if (Session::get('user')) {
                echo '' .
                    '<main class="main-wrapper">' .
                    '<div class="main-content">';
            }
            require $path;
            if (Session::get('user')) {
                echo '</div>' .
                    '</main>';
            }
            require_once $directory . 'views/layouts/footer.php';
        } else {
            die("Vista no encontrada");
        }
    }
}
