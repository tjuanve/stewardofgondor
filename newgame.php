<?php
    require "header.php";
?>

<div class="wrapper">

<h1>Add a new game</h1>


<?php
    if ( isset($_GET['error']) ) {
        if ( $_GET['error'] == "usernotexist" ) {
            echo '<p class="errormessage">One of the players is not registered yet</p>';
        }
        else if ( $_GET['error'] == "notenoughplayers" ) {
            echo '<p class="errormessage">You need at least 2 players!</p>';
        }
        else if ( $_GET['error'] == "nofaction" ) {
            echo '<p class="errormessage">Every user needs a faction!</p>';
        }
        else if ( $_GET['error'] == "noteam" ) {
            echo '<p class="errormessage">Every player needs a team!</p>';
        }
        else if ( $_GET['error'] == "nowinner" ) {
            echo '<p class="errormessage">The winner must be among the teams of the players</p>';
        } 
        else if ( $_GET['error'] == "sqlerror" ) {
            echo '<p class="errormessage">Database error</p>';
        }
        else if ( $_GET['error'] == "duplicateuser" ) {
            echo '<p class="errormessage">Players cant be duplicated</p>';
        }              
    }
    else if ( isset($_GET['signup']) ) {
        if ( $_GET['signup'] == "success" ) {
            echo '<p class="signupsuccess">Game added succesfully</p>';
        }
    }  
?>

<?php
if ( isset($_SESSION['userId']) ) {
    echo  "<p>You are logged in!</p>";

    echo '<div class="newgame">

<form class="form-signup" action="includes/add_game.inc.php" method="POST">
<fieldset>
    <legend>Player 1</legend>
    <input type="text" name="player1" placeholder="Username">
    <br>
    <label for="faction1">Choose faction</label> 
    <br>
    <select id="faction1" name="faction1">
        <option value="">-</option>
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team1">Choose team</label> 
    <br>
    <select id="team1" name="team1">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>


<fieldset>
    <legend>Player 2</legend>
    <input type="text" name="player2" placeholder="Username">
    <br>
    <label for="faction2">Choose faction</label> 
    <br>
    <select id="faction2" name="faction2">
        <option value="">-</option>                
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team2">Choose team</label> 
    <br>
    <select id="team2" name="team2">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>


<fieldset>
    <legend>Player 3</legend>
    <input type="text" name="player3" placeholder="Username">
    <br>
    <label for="faction3">Choose faction</label> 
    <br>
    <select id="faction3" name="faction3">
        <option value="">-</option>        
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team3">Choose team</label> 
    <br>
    <select id="team3" name="team3">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>

<fieldset>
    <legend>Player 4</legend>
    <input type="text" name="player4" placeholder="Username">
    <br>
    <label for="faction4">Choose faction</label> 
    <br>
    <select id="faction4" name="faction4">
        <option value="">-</option>        
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team4">Choose team</label> 
    <br>
    <select id="team4" name="team4">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>

<fieldset>
    <legend>Player 5</legend>
    <input type="text" name="player5" placeholder="Username">
    <br>
    <label for="faction5">Choose faction</label> 
    <br>
    <select id="faction5" name="faction5">
        <option value="">-</option>        
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team5">Choose team</label> 
    <br>
    <select id="team5" name="team5">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>

<fieldset>
    <legend>Player 6</legend>
    <input type="text" name="player6" placeholder="Username">
    <br>
    <label for="faction6">Choose faction</label> 
    <br>
    <select id="faction6" name="faction6">
        <option value="">-</option>        
        <option value="Angmar">Angmar</option>
        <option value="Dwarves">Dwarves</option>
        <option value="Elves">Elves</option>
        <option value="Goblins">Goblins</option>
        <option value="Men">Men</option>
        <option value="Mordor">Mordor</option>
        <option value="Isengard">Isengard</option>
    </select>
    <br>
    <label for="team6">Choose team</label> 
    <br>
    <select id="team6" name="team6">
        <option value="">-</option>        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
</fieldset>


<fieldset>
    <label for="winner">Winning team</label> 
    <br>
    <select id="winner" name="winner">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>   
    <button type="submit" name="submit">Add to database</button>
</fieldset>



</form>

</div>';

}
else {
    echo "<p>Please login to add games</p>";
}

?>

</div>

<?php
    require "footer.php";
?>


