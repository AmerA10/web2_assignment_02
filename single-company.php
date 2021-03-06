<?php 
session_start();

require_once 'includes/db-classes.inc.php';
require_once 'includes/helpers.inc.php'; 
require_once 'includes/stock-config.inc.php';

$companiesGateway = new CompanyDB($connection);
try {

    if (isset($_GET['symbol'])) {
        $company = $companiesGateway->getAllForCompany($_GET['symbol'])[0]; // specifiying index 0, since getAllForCompanies returns a 2D associative array with only one element

    }
 } catch (PDOException $e) {
    die( $e->getMessage() );
 }

catch(Exception $e){
    die($e ->getMessage());
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
    <link rel="stylesheet" href="css/single-company.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="index.php"><img src='logos/sitelogo.png' class='sitelogo'></a>
                <a href="list.php">Company</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            <nav class="pageLinks">
                <ul>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="list.php">Companies</a></li>
                    <?php
                    if (isset($_SESSION[("loggedin")]) && $_SESSION['loggedin']) {
                    
                            echo "<li><a href='portfolio.php'>Portfolio</a></li>";
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='favorites.php'>Favorites</a></li>";
                            echo "<li><a href='logout.php'>Logout</a></li>";
                  
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='signup.php'>Signup</a></li>";
                    }

                    ?>
                </ul>
            </nav>
        </header>
        <div id="companyInfo" class="fadeIn defaultView">
            <span id="companyInfoHeader">
                <img src='logos/<?=$company['symbol']?>.svg' class="logo">
                <h2 class="name"><?=$company['name']?></h2>
                <h2 class="symbol"><?=$company['symbol']?></h2>
            </span>
            <div id="companyInfoBody">
                <hr>
                <p class="description"><?=$company['description']?></p>
                <hr>
                    <div class='leftContainer'>
                        <span class="bold">Sector </span><br><span><?=$company['sector']?></span><br><br>
                        <hr>
                        <span class="bold">Subindustry </span><span><br><?=$company['subindustry']?><span><br>
                    </div>
                    <div class='rightContainer'>
                        <span class="bold">Exchange </span><br><span><?=$company['exchange']?></span><br><br>
                        <hr>
                        <span class="bold">Location </span><br><span><?=$company['address']?><span><br>
                        <a href="" id="companyURL"><?=$company['website']?></a>
                    </div>
                </div>
                
            <br/><br/>
            <div class="buttonContainer">
                <a href='addtofav.php?symbol=<?=$company['symbol']?>'>Add to Favorites</a>
                <a href='history.php?symbol=<?=$company['symbol']?>&sort=date'>History</a>
            </div>
            </div>
    </body>
    <script src="js/main.js"></script>
</html>