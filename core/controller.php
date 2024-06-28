<?php
class Controller {
    protected $view, $model;

    public function __construct() {
        $this->view = new Views();
        $this->loadModel();
    }

    public function loadModel(){
        $model = get_class($this) . 'Model';
        $path = 'models/' . $model . '.php';

        if(file_exists($path)){
            require $path;
            $this->model = new $model();
        }else{
            die("Modelo no encontrado");
        }
    }
}