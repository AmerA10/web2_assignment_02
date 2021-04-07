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
    public function getAllForHistory($symbol) { 
        $symbol = strtolower($symbol);
        $sql = self::$baseSQL . " WHERE symbol=?"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 
        return $statement->fetchAll(); 
    } 
    

}

class PortfolioDB {
    private static $baseSQL = "SELECT * FROM Portfolio"; 
    public function __construct($connection) { 
        
        $this->pdo = $connection; 
    }
    public function getAllForPortfolio($symbol) { 
        $symbol = strtolower($symbol);
        $sql = self::$baseSQL . " WHERE symbol=?"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 
        return $statement->fetchAll(); 
    } 
}

class stocksDB {
    private static $baseSQL = "SELECT * FROM Stocks-3rd"; 
    public function __construct($connection) { 
        $this->pdo = $connection; 
    }
    public function getAllForStock($symbol) { 
        $symbol = strtolower($symbol);
        $sql = self::$baseSQL . " WHERE symbol=?"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 
        return $statement->fetchAll(); 
    } 

}

class UsersDB {
    private static $baseSQL = "SELECT * FROM Users"; 
    public function __construct($connection) { 
        $this->pdo = $connection; 
    }
    public function getAllForUser($symbol) { 
        $symbol = strtolower($symbol);
        $sql = self::$baseSQL . " WHERE symbol=?"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 
        return $statement->fetchAll(); 
    } 

}

?>