<?php
//at some point here check the session shit in order to determine the actual user ID
//Until Then just get it done with a default ID
//Initially lets pretend that the user ID is equal to 2
include 'includes/db-classes.inc.php';
include 'includes/helpers.inc.php';
include 'includes/stock-config.inc.php';
//include 'includes/config.inc.php';
$defID = 2;
//ok first lets make a connection to the database
try {
   
    $usersGateWay = new UsersDB($connection);
    $portGateway = new PortfolioDB($connection);
    $historyGateway = new HistoryDB($connection);
    
    //grab the session userId from here yk
    $portfolio = $portGateway->getAllForUserPortfolio();

    $closeAmt = 0;
    $valueAmt = 0;
    $totalAmt = 0;
    //print_r($portfolio);
   
    print_r($portfolio->getAllForUserPortfolio());
    //next step is to get every symbol and every amount 
    echo '</br>';
    // foreach($portfolio as $port) { //this gives access to every image logo for the dumbass companies
    //     echo '-------------------- </br>';
    //     echo 'Symbol:  ' . $port['symbol'] . '-  Amount:  ' . $port['amount'];
    //     $companyHistoryDate = $historyGateway->getDateForHistory($port['symbol']);
    //     echo (' - Close: ' . $companyHistoryDate[0]['close'] );
    //     echo (' - value ' . $companyHistoryDate[0]['close'] * $port['amount'] . '</br>');
    //     //because the order by is desc, the date at the [0] position is the latest
    //     echo '-------------------- </br>';
    // }

}
catch(Exception $e) {
  
    die($e->getMessage());
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="portfolio.php">Portfolio</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <div class="pageLinks">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="list.php">Companies</a>
                <a href="portfolio.php">Portfolio</a>
                <a href="profile.php">Profile</a>
                <a href="favorites.php">Favorites</a>
                <a href="logout.php">Logout</a>
            </div>
        </header>
    </body>
    <script src="js/main.js"></script>
</html>