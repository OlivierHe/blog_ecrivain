<?php

use App\Autoloader;
use App\Router;
use Action\ReadAction;

require '../App/Autoloader.php';
Autoloader::register();

//var_dump($_REQUEST);
$router = new Router($_REQUEST);
$router();


