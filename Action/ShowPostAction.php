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
    private $router;

    public function __construct(
        Router $router,
        ShowPostResponder $responder,
        Database $db
    )
    {
        $this->router = $router;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {

        if (intval($this->router->request) <=
            intval($this->db->queryMaxId('articles')[0]->id)
        ){
            $data = $this->db->queryBy('articles', 'id', array($this->router->request));
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