<?php
session_start();



if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin']) {

    if (isset($_SESSION['userId'])) {
        unset($_SESSION['userId']);
    
    }
    if (isset($_SESSION['userEmail'])) {
        unset($_SESSION['userEmail']);
        
    }

  
    $_SESSION["loggedin"] = false;
    header("location: index.php");
} else {
    header("location: index.php");
}
