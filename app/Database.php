<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 02/07/2017
 * Time: 19:12
 */

namespace App;




class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    public function __construct()
    {
        $config = require '../config/config.php';
        $this->db_name = $config->db_name;
        $this->db_user = $config->db_user;
        $this->db_host = $config->db_host;
        $this->db_pass = $config->db_pass;
    }

    private function getPDO(){
            if ($this->pdo === null ) {
            $pdo = new \PDO('mysql:dbname='.$this->db_name.';host=localhost',$this->db_user,$this->db_pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(\PDO::FETCH_OBJ);
        return $datas;
    }
}