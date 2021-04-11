<?php

    //still need lots of work on this. trying to figure out how to properly remove the
    //array from the session.
    session_start();

    $favorites = $_SESSION['fav'];
    echo $_GET['entry'];
    if ($_GET['entry'] != 'all') {
        unset($favorites[$_GET['entry']]);
        print_r($favorites);
        $_SESSION["fav"] = array_filter($favorites);
    } else {
        $_SESSION["fav"] = [];
    }
    header("location: favorites.php");
?>
