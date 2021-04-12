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

 
        $symbol = strtolower($symbol);
        $sql = self::$baseSQL . " WHERE symbol=?"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 

        return $statement->fetchAll(); 
    } 
} 

class HistoryDB {
    private static $baseSQL = "SELECT * FROM History";
    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getAllForCompany($symbol, $sort) {
        $sql = self::$baseSQL . " WHERE symbol='$symbol' ORDER BY $sort";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }
}

class PortfolioDB {

}

class stocksDB {

}

class UsersDB {
    private static $baseSQL = "SELECT * FROM Users"; 
    
    public function __construct($connection) { 
        $this->pdo = $connection; 
    } 

    public function login() {
        $sql = self::$baseSQL . "where email = :email and password = :password"; 
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":email", $POST["email"]);
        $statement->bindValue(":password", $_POST["password"]);
        $result = $statement->excute();
    } 
}

?>