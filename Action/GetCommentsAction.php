<?php
/**
 *  * User: Olivier Herzog
 * Date: 14/08/2017
 * Time: 16:06
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\GetCommentsResponder;


class GetCommentsAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        GetCommentsResponder $responder,
        Database $db
    )
    {
        $this->request = $request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        session_start();
        if ($_SESSION['type'] === 'ADMIN') {
            $data = $this->db->queryAll('commentaires', 'signale, pseudo, email, content, ip, date, id ', 'signale');
            $this->responder->setData($data);
        }else {
            $this->responder->setData(header('Location: http://localhost/blog_ecrivain/error/403'));
        }
        return $this->responder->__invoke();
    }
}