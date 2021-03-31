<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="login.php">Login</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <div class="pageLinks">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="list.php">Companies</a>
                <a href="portfolio.php">Portfolio</a>
                <a href="profile.php">Profile</a>
                <a href="favorites.php">Favorites</a>
                <a href="logout.php">Logout</a>
            </div>
        </header>

        <div class="container">
    
    <p>Please fill in your account info</p>
    
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  min="7" max="15" required>

    <a href="login.php"><button type="button" class="cancelbtn">login</button></a>
    <h3 id= "noacc">No Account?</h3>
    <a href="signup.php"><button type="button" class="signup">Sign Up</button></a>
    
      
    </div>
  </div>
</form>


    </body>
    <script src="js/main.js"></script>
</html>