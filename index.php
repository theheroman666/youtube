<?php
session_start();
require_once 'autoload.php';
require_once 'views.php';
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'models/ModelBase.php';
require_once 'helpers/utils.php';

// require_once 'config/database.php';
require_once 'config/parameters.php';
// require_once 'helpers/utils.php';

function show_error()
{
    $error = new ErrorController();
    $error->NotFound();
}

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller = Controller;
} else {
    show_error();
    exit;
}

if (class_exists($controller)) {
    $controlador = new $controller();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = Action;
        $controlador->$action_default();
    } else {
        show_error();
    }
} else {
    show_error();
}
