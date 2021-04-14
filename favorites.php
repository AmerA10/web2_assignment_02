<?php
session_start();

function createFavList() {
    if (isset($_SESSION['fav']) && !empty($_SESSION['fav'])) {
        $favorites = $_SESSION['fav'];
    
        $keys = array_keys($favorites);

        for($i = 0; $i < count($favorites); $i++) {
            foreach ($favorites[$keys[$i]] as $array) {
                echo '<tr>';
                echo "<td><img src='logos/" . $array['symbol'] . ".svg' style='width:160px;height:100px'></td>";
                echo "<td>" . $array['symbol'] . "</td>";
                echo "<td>" . $array['name'] . "</td>";
                echo "<td><a class='remove' href='removefavorite.php?entry=" . $i . "'>Remove</a></td>";
                echo '</tr>';
            }
    
        }
    }
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
    <link rel="stylesheet" href="css/favorites.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="favorites.php">Favourites</a>
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
        <div>
            <table id="favtable">
                <?=createFavList();?>
            </table>
            <a class='removeall' href='removefavorite.php?entry=all'>Remove All</a>
        <div>
    </body>
    <script src="js/main.js"></script>
</html>