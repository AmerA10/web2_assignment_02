
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
    public function getCompanyName($symbol) {
        $symbol = strtolower($symbol);
        $sql = "SELECT name From Companies WHERE symbol=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol));
    }
}

class HistoryDB {



    public function getAllForCompany($symbol, $sort) {
        $sql = self::$baseSQL . " WHERE symbol='$symbol' ORDER BY $sort";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }

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
    public function getDateForHistory($symbol) {
        $sql = "SELECT date, close FROM History WHERE symbol=? ORDER BY date desc ";
        $symbol = strtolower($symbol);
   
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol)); 
        return $statement->fetchAll(); 
    }
    



}

class PortfolioDB {
    private static $baseSQL = "SELECT * FROM portfolio"; 
    public function __construct($connection) { 
        
        $this->pdo = $connection; 
    }
    public function getAllForUserPortfolio() {
        
      // $sql = "SELECT portfolio.userId, portfolio.amount, portfolio.symbol 
      // FROM portfolio LEFT JOIN users On portfolio.userId = users.id WHERE portfolio.userId=?";
       $sql = "SELECT * from portfolio";
       $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
       return $statement->fetchAll();
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
    public function getAllUserStuff() {
    
        $sql = "SELECT * FROM Users";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 

    } 


    
}


?>