<?php

namespace src\utils;

class Database {
    public \PDO $pdo;

    public static Database $database;

    public function __construct() {
        

        $this->pdo = new \PDO("mysql:host=localhost;port=3306;dbname=bake_ice", "root", "") ?? false;
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        if(!$this->pdo == true) {
            die("No COnnection to server");
        }
        self::$database = $this;
    }

    public function executeQuery(string $query, $params = []) {
        $statement = $this->pdo->prepare($query);
        
        if($statement->execute($params)){
            
            return [$statement->rowCount(), $statement->fetchAll(\PDO::FETCH_ASSOC), $statement->fetch()];
        }
        
        return false;
    }

    public function executeQueryMulti(string $query, $params = []) {
        $statement = $this->pdo->prepare($query);
        $statement->execute( $params);
        return $statement->rowCount();
    }
}
