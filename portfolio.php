<?php


include 'includes/db-classes.inc.php';
include 'includes/helpers.inc.php';
include 'includes/stock-config.inc.php';
//include 'includes/config.inc.php';

$usersGateWay = new UsersDB($connection);
$portGateway = new PortfolioDB($connection);
$historyGateway = new HistoryDB($connection);

try {


    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $userEmail = $_SESSION['userEmail'];
        echo $userId;
        echo $userEmail;
        if ($usersGateWay->compareUserId($userId, $userEmail)) {


            $userStuff = $usersGateWay->getAllForUser($userId);
            $closeAmt = 0;
            $valueAmt = 0;
            $totalAmt = 0;

            print_r($portfolio);

            print_r($userStuff);

            echo '</br>';
            foreach ($portfolio as $port) { //this gives access to every image logo for the dumbass companies
                echo '-------------------- </br>';
                echo 'Symbol:  ' . $port['symbol'] . '-  Amount:  ' . $port['amount'];
                $companyHistoryDate = $historyGateway->getDateForHistory($port['symbol']);
                echo (' - Close: ' . $companyHistoryDate[0]['close']);
                echo (' - value ' . $companyHistoryDate[0]['close'] * $port['amount'] . '</br>');
                //because the order by is desc, the date at the [0] position is the latest
                echo '-------------------- </br>';
            }
        }
    
    }
} catch (Exception $e) {

    die($e->getMessage());
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
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