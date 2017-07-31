<?php

use App\Autoloader;
use App\Router;

require '../App/Autoloader.php';
Autoloader::register();


$router = new Router();
$router->callAction();


