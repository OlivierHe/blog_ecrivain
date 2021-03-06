<?php
/**
 * Created by PhpStorm.
 * User: MiniTarlouf
 * Date: 02/07/2017
 * Time: 19:12
 */

namespace Domain;

use App\Settings;

class Database
{

    private $config;
    private $pdo;

    public function __construct(Settings $config)
    {
        $this->config = $config->config;
    }

    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:dbname=' . $this->config['db_name'] . ';host='.$this->config['db_host'], $this->config['db_user'], $this->config['db_pass']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }


    public function queryAll($tableName,$cols = '*',$orderCol = 'id', $order = 'DESC')
    {
        $req = $this->getPDO()->query(
            'SELECT '. $cols .
            ' FROM ' . $tableName .
            ' ORDER BY ' . $orderCol.' '. $order
        );
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryColsOrderLimit($tableName,$cols = '*', $limit,$orderCol = 'id', $order = 'DESC')
    {
        $req = $this->getPDO()->query(
            'SELECT '. $cols .
            ' FROM ' . $tableName .
            ' ORDER BY ' . $orderCol.' '. $order.
            ' LIMIT ' .$limit
        );
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }



    public function queryAllExcerpt($cols, $colSample, $amountSample, $tableName, $order = 'DESC')
    {
        $req = $this->getPDO()->query(
            'SELECT ' . $cols .
            ', LEFT (' . $colSample . ', ' . $amountSample .
            ') AS ' . $colSample .
            ' FROM ' . $tableName .
            ' ORDER BY id ' . $order
        );
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryBy($tableName, $byCol, $bindArr)
    {
        $req = $this->getPDO()->prepare(
            'SELECT * FROM ' . $tableName .
            ' WHERE ' . $byCol .
            ' = ?'
        );
        $req->execute($bindArr);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryByAndNull($tableName, $byCol, $andCol, $bindArr)
    {
        $req = $this->getPDO()->prepare(
            'SELECT * FROM ' . $tableName .
            ' WHERE ' . $byCol .
            ' = ? AND '. $andCol.
            ' IS NULL '
        );
        $req->execute($bindArr);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryByAndNotNull($tableName, $byCol, $andCol, $bindArr)
    {
        $req = $this->getPDO()->prepare(
            'SELECT * FROM ' . $tableName .
            ' WHERE ' . $byCol .
            ' = ? AND '. $andCol.
            ' IS NOT NULL '
        );
        $req->execute($bindArr);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryOneByMax($tableName, $maxCol)
    {
        $req = $this->getPDO()->query(
            'SELECT * FROM ' . $tableName .
            ' WHERE ' . $maxCol .
            ' = (SELECT MAX(' . $maxCol .
            ') FROM ' . $tableName . ')');
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function queryMaxId($tableName){
        $req = $this->getPDO()->query(
            'SELECT max(id) As id FROM ' . $tableName );
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insertArticle($bindArr){
        $req = $this->getPDO()->prepare('INSERT INTO articles (titre,contenu) VALUES (?,?)');
        $req->execute($bindArr);
    }

    public function insertComment($bindArr)
    {
        $req = $this->getPDO()->prepare('INSERT INTO commentaires
             (article_id,sous_com_id,pseudo,email,content,signale,ip)
              VALUES (?, ?, ?, ?, ?, ?, ?)');
        $req->execute($bindArr);
    }

    public function updateOneValueWhere($tableName,$col,$value,$bindArr){
        // UPDATE commentaires SET signale = signale +1 WHERE id = '14';
        $req = $this->getPdo()->prepare(
            ' UPDATE ' . $tableName .
            ' SET ' . $col .
            ' = ' . $col .
            ' ' . $value .
            ' WHERE id = ?'
        );
        $req->execute($bindArr);

    }

    public function updateTwoValueWhere($tableName,$cols,$bindArr){
        $req = $this->getPdo()->prepare(
            ' UPDATE ' . $tableName .
            ' SET ' . $cols[0] . ' =  ? '.
            ' , ' . $cols[1] . ' =  ? '.
            ' WHERE id = ? '
        );
        $req->execute($bindArr);
    }

    public function deleteFromWhere($tableName,$col,$bindArr){
        $req = $this->getPDO()->prepare(
            ' DELETE FROM ' . $tableName .
            ' WHERE ' . $col . ' = ? '
        );
        $req->execute($bindArr);
    }

    public function prepare($statement, array $bindArr)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($bindArr);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }


}