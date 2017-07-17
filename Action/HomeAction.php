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

    public function __construct(Router $request){
        $this->request = $request;
        var_dump($this->request);
        $this->db = new Database();
        //$this->responder = new HomeResponder();
    }

    public function __invoke()
    {
        // need rework for db

            $data = $this->db->queryAll(true);

        //$this->responder->setData($data);
        //return $this->responder->__invoke($p);
    }
}