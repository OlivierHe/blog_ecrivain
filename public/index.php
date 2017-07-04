<?php

use App\Autoloader;

require '../app/Autoloader.php';
Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}
// init des obj
$db = new App\Database();

// le content va être égal au résultat après ob_start() et envoyé sur le require après ob_get_clean();
ob_start();

switch ($p) {
    case 'home':
        require '../pages/home.php';
        break;
    case 'single':
        require '../pages/single.php';
        break;
    case 'post':
        require '../pages/post.php';
        break;
}


$content = ob_get_clean();
require '../pages/templates/default.php';
