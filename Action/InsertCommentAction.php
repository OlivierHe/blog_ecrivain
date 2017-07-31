<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 31/07/2017
 * Time: 16:33
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\InsertCommentResponder;


class InsertCommentAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        InsertCommentResponder $responder,
        Database $db
    )
    {
        $this->request = $request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
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
                var_dump($value . ' est invalide');
            }
        }

        //var_dump('post n :'.$_POST['n'].' param n :'.$_PARAM['n']);
        // useless control
        if ($pseudo && $email && $comment) {
            $this->db->insertComment(array($_GET['n'], $sous_com_id, $pseudo, $email, $comment, 0, $_SERVER['REMOTE_ADDR']));
        }
    }

}