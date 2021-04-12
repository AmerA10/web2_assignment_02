<?php

include 'helpers.inc.php';
include 'db-classes.inc.php';
include 'config.inc.php';


$pdo = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
$usersGateway = new UsersDB($pdo);

//check query string print login failled

if (loginCheck($pdo)){     
    session_start();    
    $_SESSION[("loggedin")] = true;
    header("location: ..\index.php");
    exit();
}else{
    header("location: ..\login.php");
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
                
            return true;
        }
    } 
        return false; 

    }catch(Exception $e){
        return false;
    }
}

?>