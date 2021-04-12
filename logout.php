<?php
session_start();



if(isset($_SESSION["loggedin"]) && $_SESSION['loggedin']) {
//     $_SESSION["loggedin"] = false;
//     if(isset($_SESSION['userId'])) {
//         session_unset($_SESSION['userId']);
//     }
//     if(isset($_SESSION['userEmail'])) {
//         session_unset($_SESSION['userEmail']);
//     }

//     header("location: index.php");
echo "this page works..";
}
// else {
//     header("location: index.php");
// }

?>