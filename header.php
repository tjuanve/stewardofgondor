<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Build me an army..</title>
    <meta charset="utf-8">
    <meta name="description" content="This website defends Middle-Earth against enemies from the East"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="lotr, bfme2, rotwk">
    <meta name="author" content="Denethor">
    <link rel="stylesheet" type="text/css" href="style_mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


<!-- <img class="image-banner" src="images/denethor.jpg" alt="I am the steward of Gondor"> -->


<div class="header">
</div>

<header>
    
    <a href="./index.php" class="active"> <img class="logo-tree" src="images/white_tree_4.png"> Gondor, Home of the Steward</a>
    <div id="myLinks">
        <nav class="nav-header-main">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="newgame.php">Add new game</a></li>
                <li><a href="leaderbord.php">Leaderbord</a></li>
                <li><a href="games.php">Games</a></li>
                <li><a href="statistics.php">Statistics</a></li>
            </ul>
        </nav>
        <div class="header-login">
            <?php
            if (!isset($_SESSION['userId'])) {
              echo '<form class="login-form" action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="E-mail/Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">Login</button>
              </form>
              <a href="signup.php" class="header-signup">Signup</a>';
            }
            else if (isset($_SESSION['userId'])) {
              echo '<form action="includes/logout.inc.php" method="post">
                <button class="logout-button" type="submit" name="login-submit">Logout</button>
              </form>';
            }
            ?>
        </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars" ></i>
    </a>

</header> 


<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
