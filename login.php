<?php 
  include 'includes/helpers.inc.php';
  include 'includes/db-classes.inc.php';
  include 'includes/config.inc.php';

  session_start();

  if (isset($_SESSION[("loggedin")])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="login.php">Login</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <div class="pageLinks">
                <a href="about.php">About</a>
                <a href="list.php">Companies</a>
                <a href="portfolio.php">Portfolio</a>
                <a href="profile.php">Profile</a>
                <a href="favorites.php">Favorites</a>
                <a href="logout.php">Logout</a>
            </div>
        </header>

<!--  Retrived from:  https://codepen.io/danzawadzki/pen/EgqKRr -->
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <h2 class="active"> Sign In </h2>

      <form method="post" action= "includes\login.inc.php">
        <input type="text" id="login" class="fadeIn second" name="email" placeholder="email">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
    
    </body>
   
    <script src="js/main.js"></script>
</html>

    
    <script src="js/main.js"></script>
</html>