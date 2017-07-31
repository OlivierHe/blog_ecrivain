<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 31/07/2017
 * Time: 16:49
 */

namespace Responder;


class InsertCommentResponder
{
    private $data;

    public function __invoke()
    {
        $data = $this->data;
        ob_start();
        require '../Views/insert_com.php';
        $content = ob_get_clean();
        require '../Views/templates/default.php';
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}