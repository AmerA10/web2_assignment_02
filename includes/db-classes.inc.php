<?php

class CompanyDB { 
    private static $baseSQL = "SELECT * FROM Companies"; 
    
    public function __construct($connection) { 
        $this->pdo = $connection; 
    } 
    
    public function getAll() { 
        $sql = self::$baseSQL . " ORDER BY name"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 
    } 

    public function getAllForCompany($symbol) { 
        $sql = self::$baseSQL . " WHERE symbol='$symbol'"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 
    } 
} 

class HistoryDB {

}

class PortfolioDB {

}

class stocksDB {

}

class UsersDB {

}

?>