<?php

include 'helpers.inc.php';
include 'db-classes.inc.php';
include 'stock-config.inc.php';



$usersGateway = new UsersDB($connection);

//check query string print login failled

if (loginCheck($usersGateway)){     
    session_start();    
    $_SESSION[("loggedin")] = true;
    header("location: ..\index.php");
    exit();
}else{
    header("location: ..\login.php");
    exit();
}

//check if email is left empty
function loginCheck($usersGateway){

    if(!isset($_POST['email']))
        return false;
        $userEmail = $_POST['email'];
    try{
  
        $statement = $usersGateway->getUserEmail($userEmail);
         
    
       if(isset($_POST['password'])){
           $userPwd = $_POST['password'];
           if(password_verify($userPwd, $statement[0]['password'])){
                
            return true;
        }
    } 
        return false; 

    }catch(Exception $e){
        return false;
    }
}

?>