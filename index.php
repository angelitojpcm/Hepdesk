<?php
session_start();
require_once 'core/autoload.php';
require_once 'core/config.php';

//Definimos la variable ruta
$route = !empty($_GET['route']) ? $_GET['route'] : 'dashboard/index';
$array = explode('/', $route);
$controller = ucfirst($array[0]); //home -> Home
$method = "index"; //index

$param = ""; // -> tickets/1213

if (!empty($array[1])) {
    if ($array[1] != "") {
        $method = $array[1];
    }
}

//Parametros de la ruta 

if (!empty($array[2])) {
    if ($array[2] != "") {
        for ($i = 2; $i < count($array); $i++) {
            $param .= $array[$i] . ',';
        }

        $param = trim($param, ',');
    }
}

//Instanciamos el controlador 
$path = "controllers/" . $controller . ".php";
if (file_exists($path)) {
    require_once $path;
    $controller = new $controller();

    //Verificamos que el metodo exista
    if (method_exists($controller, $method)) {
        $controller->$method($param);
    } else {
        echo "El metodo no existe";
    }
} else {
    echo "El controlador no existe";
}
