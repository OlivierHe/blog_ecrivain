<?php
/**
 *  * User: Olivier Herzog
 * Date: 15/08/2017
 * Time: 17:48
 */

namespace Responder;


class UploadPicResponder
{
    private $data;

    public function __invoke()
    {
        $data = $this->data;
        if ($_SESSION['type'] === 'ADMIN') {
            $_SESSION['message'] = json_encode($data);
            return (header('Location: http://localhost/blog_ecrivain/televerser_image'));
        } else {
            return $data;
        }
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}