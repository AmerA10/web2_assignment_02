<?php
    include 'includes/helpers.inc.php';
    include 'includes/db-classes.inc.php';
    include 'includes/config.inc.php';

    session_start();
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
    $companiesGateway = new CompanyDB($conn);

    if(!isset($_SESSION["fav"])) {
        $_SESSION["fav"] = [];
    }
    $fav = $_SESSION["fav"];
    $fav[] = $companiesGateway->getAllForCompany($_GET["symbol"]);
    //$fav[] = $_GET["symbol"];
    $_SESSION["fav"] = $fav;
    print_r($fav);
    //session_destroy();
    $conn = null;
    //header("location: " . $_SERVER["HTTP_REFERER"]);
?>