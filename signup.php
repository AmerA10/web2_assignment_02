<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="signup.php">Sign Up</a>
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
    

    <form action="action_page.php" style="border:1px solid #ccc">
    
    <div class="container">
    
    <p>Please fill in this form to create an account.</p>
    
    <hr>
    
    <label for="first-name"><b>First name</b></label>
    <input type="text" placeholder="Enter First name" name="first-name" required>

    <label for="last-name"><b>Last name</b></label>
    <input type="text" placeholder="Enter Last name" name="last-name" required>

    <label for="city"><b>City</b></label>
    <input type="text" placeholder="Enter the city you are from" name="city" required>

    <label for="country"><b>country</b></label>
    <input type="text" placeholder= "Enter the Country you are from" name="country" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  min="7" max="15" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <div class="clearfix">
      <a href="login.php"><button type="button" class="cancelbtn">Cancel</button></a>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

    </body>
    <script src="js/main.js"></script>
</html>