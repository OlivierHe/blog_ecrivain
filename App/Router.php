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
/* router recupère la requete et envoie sur l'action correspondante
logique :
    - rewriting uri
*/

   private $request;

    public function __construct($request)
    {
     $this->request = $request;
    }

    public function __invoke(){
        $this->checkParam();
    }

    private function checkParam()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if (count($this->request) !== 0){
            // param go to action check
            $this->checkAction();
        } else {
            // pas de param
            var_dump('go to HomeAction');
        }
    }

    private function checkAction()
    {
        $actions = array(
            'home',
            'show_post',
            'pouet_pouet_et_pouet'
        );

        if (in_array($this->request['p'], $actions)) {
            // si dans action envoie vers l'action
            $this->callAction();
        } else {
            // go to error action
            var_dump('go to error action 404');
        }

    }

    private function callAction()
    {
        $action = $this->request['p'];
        $actionName = null;
        $responderName = null;
        $underScore = strpos($action, '_');

        // supprime les _ et appel l'aciton
        if ($underScore) {
            $exploded = explode('_', $action);
            $actionPartialName = null;
            foreach( $exploded as $oneString){
               $actionPartialName .= ucfirst($oneString);
            }
            $actionName = 'Action\\'.$actionPartialName.'Action';
            $responderName = 'Responder\\'.$actionPartialName.'Responder';
        } else {
            $actionName = 'Action\\'.ucfirst($action).'Action';
            $responderName = 'Responder\\'.ucfirst($action).'Responder';
        }

        $goAction = new $actionName($this,new $responderName(),new Database());
        $goAction();

    }

}
