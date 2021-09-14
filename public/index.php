<?php
require __DIR__.'/../vendor/autoload.php';

use Louzada\NotePad\Controller\IndexController;
use Louzada\NotePad\Controller\NewNoteController;
$address = $_SERVER['PATH_INFO'];
$routes = require __DIR__.'/../config/router.php';

if(!array_key_exists($address,$routes)){
    http_response_code(404);
    exit();
}
session_start();


if (!isset($_SESSION['id']) and ($address !== '/login' and $address !== "/signup")){
    header('Location: /login');
    exit();
}
if(isset($_SESSION['id']) and ($address == '/login' or $address == '/signup')){
    header('Location: /notes');
    exit();
}
$classController = $routes[$address];
$controller = new $classController();
$controller->processRequest();
