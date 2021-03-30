<?php
    include 'includes/helpers.inc.php';
    include 'includes/db-classes.inc.php';
    include 'includes/config.inc.php';
    try {
        $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
        $companiesGateway = new CompanyDB($conn);
        if (isset($_GET['symbol'])) {
            $company = $companiesGateway->getAllForCompany($_GET['symbol']);
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
        
    </body>
    <script src="js/main.js"></script>
</html>