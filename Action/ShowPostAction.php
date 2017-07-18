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
        $this->request = $request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['n']) && $_GET['n'] !== '') {
                $data = $this->db->queryBy('articles', 'id', array($_GET['n']));
                if (count($data)) {
                    $this->responder->setData($data);
                    return $this->responder->__invoke();
                } else {
                    var_dump('go to ErrorAction 404');
                }
            } else {
                $data = $this->db->queryOneByMax('articles', 'id');
                $this->responder->setData($data);
                return $this->responder->__invoke();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($this->request);

            $pseudo = null;
            $email = null;
            $comment = null;
            $sous_com_id = null;

            $param = array('pseudo' => 'Le pseudonyme',
                'email' => 'L\'email',
                'comment' => 'Le commentaire'
            );

            foreach ($param as $oneParam => $value) {
                if (isset($_POST[$oneParam]) && $_POST[$oneParam] !== '') {
                     $$oneParam = $_POST[$oneParam];
                } else {
                    var_dump($value. ' est invalide');
                }
            }
            //var_dump('post n :'.$_POST['n'].' param n :'.$_PARAM['n']);
            // useless control
            if ($pseudo && $email && $comment) {
                $this->db->insertComment(array($_GET['n'],$sous_com_id,$pseudo,$email,$comment,0,$_SERVER['REMOTE_ADDR']));
            }
        }
    }

}