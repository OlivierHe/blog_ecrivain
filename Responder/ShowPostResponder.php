<?php
/**
 * Created by PhpStorm.
 * User: olivier
 * Date: 2017-07-17
 * Time: 23:02
 */

namespace Responder;


class ShowPostResponder
{
    private $data;

    public function __invoke()
    {
        $data = $this->data;
        ob_start();
        require '../Views/show_post.php';
        $content = ob_get_clean();
        require '../Views/templates/default.php';
    }

    public function setData($data)
    {
        $this->data = $data;
    }

}