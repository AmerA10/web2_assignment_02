

<?php
    include 'includes/helpers.inc.php';
    include 'includes/db-classes.inc.php';
    include 'includes/stock-config.inc.php';
    session_start();

    try {
      
        $historyGateway = new HistoryDB($connection);
        if (isset($_GET['symbol']) && isset($_GET['sort'])) {
            $symbol = $_GET['symbol'];
            $history = $historyGateway->getAllForCompany($_GET['symbol'], $_GET['sort']);
        }
     } catch (PDOException $e) {
        die( $e->getMessage() );
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
    <link rel="stylesheet" href="css/history.css">
</head>
<body>
        <header class="navbar">
            <div class="currentPage">
                <a href="index.php"><img src='logos/sitelogo.png' class='sitelogo'></a>
                <a href="list.php">History</a>
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
            <div class="tableContainer">
                <table class="historyTable">
                    <thead>
                        <tr>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=date'>Date</a></th>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=open'>Open</a></th>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=high'>High</a></th>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=low'>Low</a></th>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=close'>Close</a></th>
                            <th><a href='history.php?symbol=<?=$symbol?>&sort=volume'>Volume</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                            foreach ($history as $row) {
                                createRow($row);
                            }

                            // number_format solution adopted from PHP docs: https://www.php.net/manual/en/function.number-format.php
                            function createRow($row) {
                                echo '<tr>';
                                echo '<td>'.$row['date'].'</td>';
                                echo '<td>$'.number_format($row['open'], 2).'</td>';
                                echo '<td>$'.number_format($row['high'], 2).'</td>';
                                echo '<td>$'.number_format($row['low'], 2).'</td>';
                                echo '<td>$'.number_format($row['close'], 2).'</td>';
                                echo '<td>$'.number_format($row['volume'], 2).'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </header>
    </body>
    <script src="js/main.js"></script>

</html>
