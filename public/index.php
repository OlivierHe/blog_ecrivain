<?php

use \App\Autoloader;

/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-06-23
 * Time: 21:50
 */

require '../app/Autoloader.php';
Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();
if($p === 'home') {
    require '../pages/home.php';
} elseif ( $p === 'single') {
    require '../pages/single.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';
