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
use Responder\GetOneArticleResponder;

class GetOneArticleAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        GetOneArticleResponder $responder,
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
            $data = $this->db->queryBy('articles', 'id', array($this->request));
            $this->responder->setData($data);
        } else {
            $this->responder->setData(header('Location: http://localhost/blog_ecrivain/error/403'));
        }

        return $this->responder->__invoke();

    }

}