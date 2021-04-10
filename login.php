<?php 

  include 'includes/helpers.inc.php';
  include 'includes/db-classes.inc.php';
  include 'includes/config.inc.php';


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

    <?php
        include_once 'header.php '
        
    ?>
    <form method="post" action= "loginhelper.php">
  <table class="loginTable">
     <tr>
      <th>LOGIN</th>
     </tr>
     <tr>
      <td>
        <label class="firstLabel">Email:</label>
        <input type="text" name="email" id="email"/>
      </td>
     </tr>
     <tr>
      <td><label>Password:</label>
        <input type="password" name="password" id="password"/></td>
     </tr>
     <tr>
      <td>
         <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" />
         <span class="loginMsg"><?php echo @$msg;?></span>
      </td>
     </tr>
  </table>
</form>




    </body>

    
    <script src="js/main.js"></script>
</html>