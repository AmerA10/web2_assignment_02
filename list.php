
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
                <a href="list.php">Companies</a>
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
        <form>
            <div>
                <legend>Filter:</legend>
                <input type="text" id="filter" placeholder="search for company" list="companylist">
            </div><br>
                <div>
                    <input type="button" value="Go" class="button">
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
                    <ul id="companylist">
                    <?php
                    echo $companies->getAll();
                    ?>
                    </ul>
                </nav>
            </form>
    </body>
    <script src="js/main.js"></script>
    <script src="js/list-js.js"></script>
</html>