<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 22/07/2017
 * Time: 18:36
 */

namespace App;


class RoutesChecker
{
    private $value;

    private function controlType($args_num, array $value)
    {
        if ($args_num === 1) {
            return (is_string($_REQUEST['p']));
        } elseif ($args_num === 2) {
            $this->value['args'] = $_REQUEST['n'];
            return (is_string($_REQUEST['p']) && ctype_digit($_REQUEST['n']));
        } else if ($args_num === 3) {
            $this->value['args'] = [$_REQUEST['n'],$_REQUEST['a']];
            return (is_string($_REQUEST['p']) && ctype_digit($_REQUEST['n'] ) && ctype_digit($_REQUEST['a'] ));
        }
        return $nop = false;
    }

    public function getPath()
    {

        $routes_paths = require "Config/routes_paths.php";

        if (count($_REQUEST) !== 0) {

            $routing = null;
            $args_num = null;
            $go_ahead = $routes_paths['error'];

            foreach ($routes_paths as $key => $value) {
                // verifie si l'argument page est bon
                if ($_REQUEST['p'] == $key) {
                    // vérifaction du type de méthode utilisée
                    if ($_SERVER['REQUEST_METHOD'] === $value['method']) {
                        // verification du nombres d'arguments dans la requete
                        foreach ($_REQUEST as $req) {
                            if ($req !== "") {
                                $args_num++;
                            }
                        }
                        // si bon nombres d'argument on rentre
                        if ($value['args_num'] === $args_num) {
                            $this->value = $value;
                            if ($this->controlType($args_num, $value)) {
                                $go_ahead = $this->value;
                                break;
                            }
                        }

                    }
                }
            }

        } else {
            $go_ahead = $routes_paths['home'];
        }

        return $go_ahead;

    }
}