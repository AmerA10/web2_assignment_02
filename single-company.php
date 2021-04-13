<?php
    include 'includes/helpers.inc.php';
    include 'includes/db-classes.inc.php';
    include 'includes/config.inc.php';
    try {
        $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $companiesGateway = new CompanyDB($conn);
        if (isset($_GET['symbol'])) {
            $company = $companiesGateway->getAllForCompany($_GET['symbol'])[0]; // specifiying index 0, since getAllForCompanies returns a 2D associative array with only one element

        }
     } catch (PDOException $e) {
        die( $e->getMessage() );
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
                <a href='addtofav.php?symbol='<?=$company['symbol']?>>Add to Favorites</a>
                <a href='history.php?symbol=<?=$company['symbol']?>&sort=date'>History</a>
            </div>
            </div>
    </body>
    <script src="js/main.js"></script>
</html>