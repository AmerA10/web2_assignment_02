<?php
session_start();

include 'includes/db-classes.inc.php';
include 'includes/helpers.inc.php';
include 'includes/stock-config.inc.php';
//include 'includes/config.inc.php';

$usersGateWay = new UsersDB($connection);
$portGateway = new PortfolioDB($connection);
$historyGateway = new HistoryDB($connection);
$companyGateWay = new CompanyDB($connection);


try {
    $userId = $_SESSION['userId'];
    $userEmail = $_SESSION['userEmail'];

    $closeAmt = 0;
    $valueAmt = 0;
    $totalAmt = 0;
    /*todo::
    make the table look good


    */

    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $userEmail = $_SESSION['userEmail'];

        if ($usersGateWay->compareUserId($userId, $userEmail)) {

            $userStuff = $usersGateWay->getAllForUser($userId);
            $portfolio = $portGateway->getAllForUserPortfolio($userId);
        }
    } else {
        header('location: index.php');
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
    <link rel="stylesheet" href="css/portfolio.css">
</head>

<body>

    <header class="navbar">
        <div class="currentPage">
            <a href="index.php"><img src='logos/sitelogo.png' class='sitelogo'></a>
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
    <div id='table_wrapper'>
        <div id='portfolioTable'>

            <table>
                <thead>
                    <tr>
                        <th><span class='title'>Logo</span></th>
                        <th><span class='title'>Symbol</span></th>
                        <th><span class='title'>Name</span></th>
                        <th><span class='title'>Num of Shares</span></th>
                        <th><span class='title'>Close Amt</span></th>
                        <th><span class='title'>Value Amt</span></th>
                    </tr>
                </thead>
                <tbody id='list'>
                    <?php

                    foreach ($portfolio as $port) { //this gives access to every image logo for the dumbass companies
                        echo '<tr>';
                        echo "<td><img class='logo' id='listImg' src=logos/$port[symbol].svg></td>";
                        $symbol = $port['symbol'];
                        echo "<td>" . "<a class='link' href='single-company.php?symbol='$symbol>$symbol</td>";

                        $companyHistoryDate = $historyGateway->getDateForHistory($port['symbol']);
                        $companyName = $companyGateWay->getAllForCompany($port['symbol']);
                        $companyName = $companyName[0]['name'];

                        echo "<td>" . "<a class='link' href='single-company.php?symbol='$symbol>$companyName</td>"; 
                        echo "<td>  $port[amount] </td>";
                        $closeAmt = number_format((float)$companyHistoryDate[0]['close'], 2);
                        echo "<td>" . "$ " .  $closeAmt . "</td>";
                        $valueAmt = (float)$companyHistoryDate[0]['close'] * (float)$port['amount'];
                        $valueAmt = number_format($valueAmt, 2);
                        $totalAmt = (float)$totalAmt + (float)$valueAmt;
                        echo "<td>" . "$ " . $valueAmt . "</td>";
                        //because the order by is desc, the date at the [0] position is the latest
                        echo '</tr>';
                    }

                    ?>
                </tbody>
                
            </table>
            <?php $totalAmt = number_format($totalAmt, 2); ?>
            <h2 id = 'total' > Total:  <?php echo "$ " .  $totalAmt?></h2>
        </div>
    </div>


</body>
<script src="js/main.js"></script>


</html>