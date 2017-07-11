<?php

use App\Autoloader;
use Action\ReadAction;

require '../App/Autoloader.php';
Autoloader::register();

class Index
{

    private function checkViewExist($p)
    {
        $fullFilePath = '../Responder/Views/' . $p . '.php';
        if (!file_exists($fullFilePath)) {
            // a envoyer dans le responder
            header('HTTP/1.0 404 Not Found', true, 404);
            die();
        }
    }

    private function checkGet($param)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset($_GET[$param]) && $_GET[$param] !== '') {
            return 1;
        } else {
            return 0;
        }
    }

    public function route(){
        if ($this->checkGet('p'))
        {
            $p = $_GET['p'];
            $this->checkViewExist($p);

            if ($this->checkGet('n'))
            {
                $n = $_GET['n'];
            }
        }else {
            $p = 'home';
        }
        $test = new ReadAction;
        $test($p, $n);
    }

}

$init = new Index();
$init->route();

