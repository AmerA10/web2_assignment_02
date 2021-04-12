<?php
session_start();



if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin']) {

    if (isset($_SESSION['userId'])) {
        unset($_SESSION['userId']);
        echo "this page works..";
    }
    if (isset($_SESSION['userEmail'])) {
        unset($_SESSION['userEmail']);
        echo "this page works..";
    }

    //     header("location: index.php");
    $_SESSION["loggedin"] = false;
    echo "this page works..";
} else {
    header("location: index.php");
}
