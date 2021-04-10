<?php

    //still need lots of work on this. trying to figure out how to properly remove the
    //array from the session.
    session_start();

    $favorites = $_SESSION['fav'];
    echo $_GET['entry'];
    if ($_GET['entry'] != 'all') {
        array_splice($favorites[0], $_GET['entry'], 1);
        print_r($favorites);
        $_SESSION["fav"] = $favorites;
    }
    //header("location: favorites.php");
?>
