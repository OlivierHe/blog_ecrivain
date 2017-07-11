<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 10/07/2017
 * Time: 18:22
 */
namespace Action;


use Domain\Database;
use Responder\ReadResponder;


class ReadAction {

    private $db;
    private $responder;

    public function __construct(){
        $this->db = new Database();
        $this->responder = new ReadResponder();
    }

    public function __invoke($p, $n = false)
    {
        // need rework for db
        if ($n) {
            $data = $this->db->prepare('SELECT * FROM articles WHERE id = ?', array($n));
            if (!count($data)) {
                $data = $this->db->query('SELECT * FROM articles ORDER BY id DESC LIMIT 1');
            }
        } else {
            $data = $this->db->queryAll(true);
        }
        $this->responder->setData($data);
        return $this->responder->__invoke($p);
    }
}

