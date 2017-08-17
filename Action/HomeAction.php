<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 16/07/2017
 * Time: 20:39
 */

namespace Action;

use App\Router;
use App\Settings;
use Domain\Database;
use Responder\HomeResponder;

class HomeAction
{
    private $db;
    private $responder;
    private $request;
    private $config;

    public function __construct(
        Router $request,
        HomeResponder $responder,
        Database $db,
        Settings $config
    )
    {
        $this->request = $request->request;
        $this->db = $db;
        $this->responder = $responder;
        $this->config = $config;
    }

    public function __invoke()
    {
        $data = $this->db->queryAllExcerpt('id, titre','contenu',300,'articles');
        $this->responder->setConfig($this->config);
        $this->responder->setData($data);

        return $this->responder->__invoke();
    }
}