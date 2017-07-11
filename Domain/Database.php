<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 02/07/2017
 * Time: 19:12
 */

namespace Domain;


class Database
{

    private $config;
    private $pdo;

    public function __construct()
    {
        $this->config = require '../App/Config/config.php';
    }

    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:dbname=' . $this->config['db_name'] . ';host='.$this->config['db_host'], $this->config['db_user'], $this->config['db_pass']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function queryAll($excerpt = false){
        if ($excerpt) {
            $req = $this->getPDO()->query('SELECT id, titre, LEFT (contenu, 300) AS contenu FROM articles');
        } else {
            $req = $this->getPDO()->query('SELECT * FROM articles');
        }
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function query($statement){
        $req = $this->getPDO()->query($statement);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function prepare($statement,array $bindArr){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($bindArr);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }


}