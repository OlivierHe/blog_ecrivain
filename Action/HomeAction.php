<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 16/07/2017
 * Time: 20:39
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\HomeResponder;

class HomeAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        HomeResponder $responder,
        Database $db
    )
    {
        $this->request = $request->request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $data = $this->db->queryAllExcerpt('id, titre','contenu',300,'articles');
        $this->responder->setData($data);
        return $this->responder->__invoke();
    }
}