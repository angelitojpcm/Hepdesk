<?php

namespace Helpdesk\Core;

class Controller
{
    protected $view, $model;

    public function __construct($route)
    {
        $this->view = new Views($route);
        $this->loadModel();
    }

    public function loadModel()
    {
        $model = get_class($this) . 'Model';
        $model = basename(str_replace('\\', '/', $model));
        $class = "Helpdesk\\Models\\$model";

        if (class_exists($class)) {
            $this->model = new $class();
        } else {
            echo 'Modelo no encontrado';
        }
    }
}
