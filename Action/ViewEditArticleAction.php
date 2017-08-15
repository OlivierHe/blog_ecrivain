<?php
/**
 *  * User: Olivier Herzog
 * Date: 11/08/2017
 * Time: 18:01
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\ViewEditArticleResponder;

class ViewEditArticleAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        ViewEditArticleResponder $responder,
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
            $this->responder->setData(false);
        } else {
            $this->responder->setData(header('Location: http://localhost/blog_ecrivain/error/403'));
        }
        return $this->responder->__invoke();

    }
}