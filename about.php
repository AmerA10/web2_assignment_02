
<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Assignment #2</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/about.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="index.php"><img src='logos/sitelogo.png' class='sitelogo'></a>
                <a href="about.php">About</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <nav class="pageLinks">
                <ul>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="list.php">Companies</a></li>
                    <?php
                    if (isset($_SESSION[("loggedin")]) && $_SESSION['loggedin']) {
                    
                            echo "<li><a href='portfolio.php'>Portfolio</a></li>";
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='favorites.php'>Favorites</a></li>";
                            echo "<li><a href='logout.php'>Logout</a></li>";
                  
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='login.php'>Signup</a></li>";
                    }

                    ?>
                </ul>
            </nav>
        </header>
        <body>
            <div class="container">
                <h2>Web II: Web Application Development</h2>
                <h2>Assignment 2, Winter 2021</h2>
                <p>This site allows you to view stock market data about over 200 companies. Users can mark companies as favorites for easy access, and view their portfolios in an accessible and understandable layout.</p>
                <hr>
                <p>The source code for this site can be found <a href='https://github.com/AmerA10/web2_assignment_02/tree/main'>at our public repo here</a>. Each student has their own branch where their contributions can be found.
                <p>This assignment was designed by Randy Connolly at Mount Royal University, and completed by the following students:</p>
                <ul>
                    <li>
                        Amer Alagami<br>
                        <a href='https://github.com/AmerA10'>https://github.com/AmerA10</a>
                    </li>
                    <li>
                        Brett Nakonechny<br>
                        <a href='https://github.com/bnako830'>https://github.com/bnako830</a>
                    </li>
                    <li>
                        Jarret Horner<br>
                        <a href='https://github.com/JarHorner'>https://github.com/JarHorner</a>
                    </li>
                    <li>
                        Matthew Fudge<br>
                        <a href='https://github.com/mfudg395'>https://github.com/mfudg395</a>
                    </li>
                    <li>
                        Mohamed Zeineldin<br>
                        <a href='https://github.com/mzein694'>https://github.com/mzein694</a>
                    </li>
                </ul>
                <hr>
                <p>Sources for code and third-party tools:</p>
                <ul>
                    <li><a href='https://www.php.net/manual/en/function.number-format.php'>PHP Number Format Help</a></li>
                    <li><a href='https://codepen.io/danzawadzki/pen/EgqKRr'>CSS for Login Page</a></li>
                </ul>
            </div>
        </body>
    </body>
    <script src="js/main.js"></script>

</html>