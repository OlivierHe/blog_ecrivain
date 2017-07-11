<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 10/07/2017
 * Time: 18:50
 */

namespace Responder;


class ReadResponder
{
    private $data;

    public function __invoke(string $p)
    {
        $data = $this->data;
        ob_start();
        require '../Responder/Views/'.$p.'.php';
        $content = ob_get_clean();
        require '../Responder/Views/templates/default.php';
    }

    public function setData($data)
    {
      $this->data = $data;
    }
}