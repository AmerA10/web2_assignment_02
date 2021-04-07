<?php
    Session_start();

    if(!isset($_SESSION["fav"])) {
        $_SESSION["fav"] = [];
    }
    $fav = $_SESSION["fav"];
    $fav[] = $_GET["symbol"];
    $_SESSION["fav"] = $fav;
    header("location" $_SESSION["HTTP_REFERER"]);
?>