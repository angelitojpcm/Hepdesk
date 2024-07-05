<?php
session_start();

require_once 'vendor/autoload.php';

// Definimos la variable ruta
$route = !empty($_GET['route']) ? $_GET['route'] : 'dashboard/index';

// Ruta de la aplicacion
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$uri_segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// Definir $base como un array vacío
$base = [];

// Eliminar cualquier segmento después del primer nivel en la ruta
if (count($uri_segments) > 1) {
    $base = array_slice($uri_segments, 0, 1);
    $uri = '/' . implode('/', $base) . '/';
} else {
    $uri = '/' . implode('/', $uri_segments) . '/';
}

$url = $protocol . $host . $uri;

$array = explode('/', $route);
$controller = ucfirst($array[0]); // home -> Home
$method = "index"; // index

$param = ""; // -> tickets/1213

if (!empty($array[1])) {
    if ($array[1] != "") {
        $method = $array[1];
    }
}

// Parametros de la ruta 
if (!empty($array[2])) {
    if ($array[2] != "") {
        for ($i = 2; $i < count($array); $i++) {
            $param .= $array[$i] . ',';
        }
        $param = trim($param, ',');
    }
}

//Leer Variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



//Cargamos el controllador
$controller_class = 'Helpdesk\Controllers\\' . $controller;

if (class_exists($controller_class)) {
    $controller = new $controller_class($url);

    //Verificamos el metodo

    if (method_exists($controller, $method)) {
        $controller->$method($param);
    } else {
        echo 'Metodo no encontrado';
    }
} else {
    echo 'Controlador no encontrado';
}
