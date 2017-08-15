<?php
/**
 *  * User: Olivier Herzog
 * Date: 11/08/2017
 * Time: 18:03
 */

namespace Responder;


class ViewUploadPicResponder
{
    public function __invoke()
    {
        $data = $this->data;
        if ($data) {
            return $data;
        } else {
            ob_start();
            require '../Views/upload_pic.php';
            $content = ob_get_clean();
            $script = '<script src="http://localhost/blog_ecrivain/js/upload_pic.js"></script>';
            require '../Views/templates/default.php';
        }
    }

    public function setData($data)
    {
        $this->data = $data;
    }

}