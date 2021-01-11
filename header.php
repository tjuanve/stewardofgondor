<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>

</head>
    <meta charset="utf-8">
    <meta name="description" content="This website defends Middle-Earth against enemies from the East"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="lotr, bfme2, rotwk">
    <meta name="author" content="Denethor">

    <link rel="stylesheet" type="text/css" href="style_thijs.css">

    <title>Build me an army..</title>


<body>


<div class="header">
</div>

<header>
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
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['userId'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>

        
            
    </div>

</header>




<!-- 
<div class="navbar">
<a class="active" href="./">Home</a></li>
<a href="new_game/">Add new game</a></li>
<a href="leaderbord/">Leaderbord</a></li>
<a href="games/">Games</a></li>
<a href="statistics/">Statistics</a></li>
<div>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="mailuid" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="login-submit">Login</button>
    </form>
    <a href="signup.php">Signup</a>
    <form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">Logout</button>
    </form>    
</div>
</div> -->