<?php
/**
 *  * User: Olivier Herzog
 * Date: 12/08/2017
 * Time: 13:17
 */

namespace Action;

use App\Router;
use Domain\Database;
use Responder\InsertArticleResponder;


class InsertArticleAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        InsertArticleResponder $responder,
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
        if ($_SESSION['pseudonyme']) {
            $titre = $this->request[0];
            $article = $this->request[1];

            $this->db->InsertArticle([$titre,$article]);

            $this->responder->setData(['content' => 'Article ajouté !', 'params' => 'rounded green']);
        } else {
            $this->responder->setData(header('Location: http://localhost/blog_ecrivain/error/403'));
        }
        return $this->responder->__invoke();
    }
}
