<?php
/**
 *  * User: Olivier Herzog
 * Date: 07/08/2017
 * Time: 17:02
 */

namespace Responder;


class ViewLoginResponder
{

    public function __invoke()
    {
        ob_start();
        require '../Views/login_view.php';
        $content = ob_get_clean();
        $script = '<script src="http://localhost/blog_ecrivain/js/login_view.js"></script>';
        require '../Views/templates/default.php';

    }
}