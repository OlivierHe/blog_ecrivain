<?php
/**
 *  * User: Olivier Herzog
 * Date: 15/08/2017
 * Time: 21:37
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\DeletePicResponder;

class DeletePicAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        DeletePicResponder $responder,
        Database $db
    )
    {
        $this->request = $request->request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        session_start();
        if ($_SESSION['type'] === 'ADMIN') {
            $cleanPath = basename($this->request[1]);
            if (unlink('../Public/img/' . $cleanPath)) {
                $this->responder->setData(['titre' => 'Suppresion', 'content' => 'Réussie de l\'image ' . $cleanPath, 'params' => 'success']);
            } else {
                $this->responder->setData(['titre' => 'Suppresion', 'content' => 'Erreur durant la suppréssion ' . $cleanPath, 'params' => 'error']);
            }
        } else {
            $this->responder->setData(header('Location: http://localhost/blog_ecrivain/error/403'));
        }
        return $this->responder->__invoke();
    }
}