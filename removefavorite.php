<?php
    session_start();

    $favorites = $_SESSION['fav'];
    echo $_GET['entry'];
    if ($_GET['entry'] != 'all') {
        unset($favorites[$_GET['entry']]);
        if (count($_SESSION["fav"]) == 1)
            $_SESSION["fav"] = [];
        else
            $_SESSION["fav"] = array_filter($favorites);
    } else {
        $_SESSION["fav"] = [];
    }
    header("location: favorites.php");
?>
