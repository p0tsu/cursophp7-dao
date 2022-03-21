<?php

class Sql extends PDO{

    private $conn;

    public function __construc(){
        $this->conn = new PDO("MySql:host=localhost;dbname=dbphp7", "root", "");
    }

    private function setParams($statment, $parameters){

        foreach ($parameters as $key => $value) {

            $this->setParams($key, $value);

        }

    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

    }

    public function execQuery($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();
        
        return $stmt;

    }

    public function select($rawQuery, $params = array()):array{

        $stmt = $this->execQuery($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}

?>