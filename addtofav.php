<?php
    include 'includes/helpers.inc.php';
    include 'includes/db-classes.inc.php';
    include 'includes/stock-config.inc.php';

    session_start();

    $companiesGateway = new CompanyDB($connection);

    if(!isset($_SESSION["fav"])) {
        $_SESSION["fav"] = [];
    }
    $fav = $_SESSION["fav"];


    // foreach ($favorites as $key => $value) {
    //     if() {

    //     }
    // }
    

    $fav[] = $companiesGateway->getAllForCompany($_GET["symbol"]);
    
    $_SESSION["fav"] = $fav;
    print_r($fav);

    //session_destroy();

    $conn = null;
    header("location: " . $_SERVER["HTTP_REFERER"]);
?>