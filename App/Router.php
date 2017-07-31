<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 16/07/2017
 * Time: 18:50
 */

namespace App;


use Domain\Database;
use Responder\HomeResponder;

class Router
{
    public $request;

    public function callAction()
    {

       $route = new RoutesChecker();
       $path = $route->getPath();
       $this->request = $path['args'];
        var_dump($path);

       $goAction = new $path['action_route']($this,new $path['responder_route'](),new database());
       $goAction();
    }

}
