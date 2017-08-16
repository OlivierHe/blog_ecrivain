<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-07-17
 * Time: 23:01
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\ShowPostResponder;

class ShowPostAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        ShowPostResponder $responder,
        Database $db
    )
    {
        $this->request = $request->request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $data = $this->db->queryBy('articles', 'id', array($this->request));
       if(count($data)){
            $this->responder->setData($data);
        } else {
            $data[0] = new \stdClass();
            $data[0]->titre = "Erreur article !";
            $data[0]->contenu = "L'article demandé n'existe pas";
            $this->responder->setData($data);
        }

        return $this->responder->__invoke();

    }

}