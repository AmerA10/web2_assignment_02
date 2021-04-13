<?php
  session_start();    
include 'helpers.inc.php';
include 'db-classes.inc.php';
include 'config.inc.php';


$conn = DatabaseHelper::createConnection(array(DBCONNSTRING,DBUSER,DBPASS));
$usersGateway = new UsersDB($conn);

//check query string print login failled

if (loginCheck($usersGateway)){     
  
    $_SESSION[("loggedin")] = true;
    header("location: ..\index.php");
    exit();
}else{
    header("location: ..\login.php");
    exit();
}

//check if email is left empty
function loginCheck($usersGateway){

    if(!isset($_POST['email'])) {
        return false;
    }
       
        $userEmail = $_POST['email'];
    try{
  
        $statement = $usersGateway->getUserData($userEmail);
         
    
       if(isset($_POST['password'])){
           $userPwd = $_POST['password'];
           if(password_verify($userPwd, $statement[0]['password'])){
            $_SESSION['userId'] = $statement[0]['id'];
            $_SESSION['userEmail'] = $statement[0]['email'];
                
            return true;
        }
    } 
        return false; 

    }catch(Exception $e){
        return false;
    }
}

?>