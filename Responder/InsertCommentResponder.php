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
        echo $this->data;

    }

    public function setData($data)
    {
        $this->data = $data;
    }
}