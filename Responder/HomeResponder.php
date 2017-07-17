<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 10/07/2017
 * Time: 18:50
 */

namespace Responder;


class HomeResponder
{
    private $data;

    public function __invoke()
    {
        $data = $this->data;
        ob_start();
        require '../Views/home.php';
        $content = ob_get_clean();
        require '../Views/templates/default.php';
    }

    public function setData($data)
    {
      $this->data = $data;
    }
}