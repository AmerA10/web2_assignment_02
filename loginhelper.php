<?php

include 'includes/helpers.inc.php';
include 'includes/db-classes.inc.php';
include 'includes/stock-config.inc.php';

$pdo = $connection;
//$usersGateway = new UsersDB($pdo);

//check query string print login failled
if (loginCheck($pdo)){         
    header("location: index.php");
    exit();
}else{
    header("location: login.php?loginError=1");
    exit();
}


//check if email is left empty
function loginCheck($pdo){

    if(!isset($_POST['email']))
        return false;
    try{
        $sql = "SELECT email, password FROM users WHERE email=?";
        $statement = DatabaseHelper::runQuery($pdo, $sql, Array(($_POST['email'])));
        $statement = $statement-> fetchAll(); 
    
       if(isset($_POST['password'])){
           $userPwd = $_POST['password'];
           if(password_verify($userPwd, $statement[0]['password'])){
                
            session_start();

            return true;
        }
    } 
        return false; 

    }catch(Exception $e){
        return false;
    }
}

?>
