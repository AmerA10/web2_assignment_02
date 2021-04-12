<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Stock Browser</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

        <header class="navbar">
            <div class="currentPage">
                <a href="index.php">more teasdassting stuff</a>
                <i class="fa fa-bars menuIcon"></i>
            </div>
            
            <nav class="pageLinks">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="list.php">Companies</a></li>
                    <?php
                    if (isset($_SESSION[("loggedin")])) {
                        echo "<li><a href='portfolio.php'>Portfolio</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='favorites.php'>Favorites</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='login.php'>signup</a></li>";
                    }
                    ?>
                </ul>
            </nav>
            <h1>Stock Browser</h1>
        </header>
        <main>
            <div>
                <ul class="mainLinks">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="list.php">Companies</a></li>
                    <?php
                    if (isset($_SESSION[("loggedin")])) {
                        echo "<li><a href='portfolio.php'>Portfolio</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='favorites.php'>Favorites</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='login.php'>signup</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </main>
    </body>
    <script src="js/main.js"></script>

</html>
