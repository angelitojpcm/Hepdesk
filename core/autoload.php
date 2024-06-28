<?php
spl_autoload_register(function ($class) {
    //Verificamos que los archivos existan
    if (file_exists("core/" . $class . '.php')) {
        require_once "core/" . $class . '.php';
    } else {
        die("El archivo de la clase $class no existe");
    }
});
