<?php
session_start();
//just have to switch '!'
if(isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
    header("location: index.php");
    
}
else {
    header("location: index.php");
}
?>