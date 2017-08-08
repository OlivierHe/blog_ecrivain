<?php
/**
 *  * User: Olivier Herzog
 * Date: 07/08/2017
 * Time: 17:01
 */

namespace Action;


use App\Router;
use Domain\Database;
use Responder\LoginViewResponder;


class LoginViewAction
{
    private $db;
    private $responder;
    private $request;

    public function __construct(
        Router $request,
        LoginViewResponder $responder,
        Database $db
    )
    {
        $this->request = $request->request;
        $this->db = $db;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        return $this->responder->__invoke();
    }
}