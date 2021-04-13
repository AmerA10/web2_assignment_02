
<?php
session_start();



if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin']) {

    session_destroy();

    header("location: index.php");
} else {
    header("location: index.php");
}