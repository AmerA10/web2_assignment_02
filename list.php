
<?php 
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/list.css">
    
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="index.php"><img src='logos/sitelogo.png' class='sitelogo'></a>
                <a href="list.php">Companies</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <nav class="pageLinks">
                <ul>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="list.php">Companies</a></li>
                    <?php

                    if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin']) {

                    
                            echo "<li><a href='portfolio.php'>Portfolio</a></li>";
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='favorites.php'>Favorites</a></li>";
                            echo "<li><a href='logout.php'>Logout</a></li>";
                  
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='signup.php'>Signup</a></li>";
                    }

                    ?>
                </ul>
            </nav>
        </header>
            <form>
                <div id='filterbox'>
                    <label for='filter'>Filter:</label>
                    <input type="text" id="filter" placeholder="search for company by name" list="companylist">
                    <input type="reset" value="Reset" class="reset">
                </div>
                <nav>
                <!-- taken from https://tobiasahlin.com/spinkit/ -->
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
                <div id='table_wrapper'>
                    <div id='companytable'>

                        <table>
                            <thead>
                                <tr>
                                    <th><span class="title">Logo</span></th>
                                    <th><span class="title">Symbol</span></th>
                                    <th><span class="title">Name</span></th>
                                </tr>
                            </thead>
                            <tbody id='list'>

                        
                            </tbody>
                        </table>
                    </div>
                </div>
                </nav>
            </form>
    </body>
    <script src="js/main.js"></script>
    <script src="js/list-js.js"></script>

</html>