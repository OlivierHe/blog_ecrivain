<?php

use App\Autoloader;
use App\Router;
use Action\ReadAction;

require '../App/Autoloader.php';
Autoloader::register();

class Index
{
 /*   private function checkViewExist($p)
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
        // $_REQUEST[$param]
        if (isset($_GET[$param]) && $_GET[$param] !== '') {
            return $_GET[$param];
        } else {
            return $param !== 'n' ? 'home' : 0;
        }
    }

    private function requestType(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function route(){
        //var_dump($this->requestType());
        $p = $this->checkGet('p');
        $this->checkViewExist($p);
        $n = $this->checkGet('n');
        $goRead = new ReadAction;
        $goRead($p, $n);
    }*/

    public function request()
    {
        return $_REQUEST;
        // empty array si rien

    /*    $method = $_SERVER['REQUEST_METHOD'];
        // $_REQUEST[$param]
        if (isset($_REQUEST[$param]) && $_REQUEST[$param] !== '') {
            return $_REQUEST[$param];
        } else {
            return $param !== 'n' ? 'home' : 0;
        }*/
    }
}

$router = new Router($_REQUEST);
$router();
//  var_dump($router->request());

//$init = new Router($_REQUEST[$param]);

/*$init = new Index();
$init->route();*/

