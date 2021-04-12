

<?php 
require_once 'includes/db-classes.inc.php';
require_once 'includes/helpers.inc.php'; 
require_once 'includes/stock-config.inc.php';

$gateway = new CompanyDB($connection);
try {

    if(isset($_GET['symbol'])) {
        $symbol = $_GET['symbol'];
        $company = $gateway->getAllForCompany($symbol)[0];    
    }

    else  {
        $symbol = "Not exist";        
    }

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
            <hr>
            <p class="description"><?=$company['description']?></p>
            <hr>
            <span id="companyInfoBody">
                <div>
                    <span class="bold">Sector: </span><?=$company['sector']?><br>
                    <span class="bold">Subindustry: </span><?=$company['subindustry']?><br>
                    <span class="bold">Exchange: </span><?=$company['exchange']?>
                </div>
                <div>
                    <span class="bold">Location: </span><?=$company['address']?><br>
                    <a href="" id="companyURL"></a>
                </div>
            </span>
            <br/>
            <div class="buttonContainer">

               
                <a href='history.php?symbol=<?=$company['symbol']?>&sort=date'>History</a>
           

                <a href="addtofav.php?symbol=<?=$company['symbol']?>" class="favoritesButton">Add to Favorites</button>
             
            </div>
        </div>




        <h1>
     
        </h1>
        <ul id="companylist">
        <?php

        echo "<li><img src=logos/".$company['symbol'].'.svg></li>'; 
        echo "<li> " . $company['symbol'] . "</li>";
        echo '<li> ' . $company['name'] . "</li>";
        echo "<li> " . $company["sector"] . "</li>";
        echo "<li> " . $company["subindustry"] . "</li>";
        echo "<li> " . $company['address'] . "</li>";
        echo "<li> " . $company['exchange'] . "</li>";
        echo "<li> " . $company['website'] . "</li>";
        echo "<li> " . $company['description'] . "</li>";

        ?>
        </ul>

    </body>
    <script src="js/main.js"></script>


</html>