<?php
session_start();
//just have to switch '!'
if(isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
    session_unset($_SESSION['userId']);
    session_unset($_SESSION['userEmail']);
    header("location: index.php");

}

?>