<?php
    require "header.php";
?>

<h1>Games played</h1>

<table>
    <tr>
        <th></th>
        <th colspan="3">Player 1</th>
        <th colspan="3">Player 2</th>
        <th colspan="3">Player 3</th>
        <th colspan="3">Player 4</th>
        <th colspan="3">Player 5</th>
        <th colspan="3">Player 6</th>
    </tr>

    <tr>
        <th>Date added</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Username</th>
        <th>Faction</th>
        <th>Team</th>
        <th>Winner</th>
    </tr>
    <?php

    include_once 'includes/dbh.inc.php';

    $sql = "SELECT time, player1, faction1, team1, player2, faction2, team2, player3, faction3, team3, player4, faction4, team4, player5, faction5, team5, player6, faction6, team6, winner from games";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc() ) {
            echo "<tr><td>". $row["time"] ."</td><td>". $row["player1"] ."</td><td>". $row["faction1"] ."</td><td>". $row["team1"] ."</td><td>". $row["player2"] ."</td><td>". $row["faction2"] ."</td><td>". $row["team2"] ."</td><td>". $row["player3"] ."</td><td>". $row["faction3"] ."</td><td>". $row["team3"] ."</td><td>". $row["player4"] ."</td><td>". $row["faction4"] ."</td><td>". $row["team4"] ."</td><td>". $row["player5"] ."</td><td>". $row["faction5"] ."</td><td>". $row["team5"] ."</td><td>". $row["player6"] ."</td><td>". $row["faction6"] ."</td><td>". $row["team6"] ."</td><td>". $row["winner"]  ."</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "0 result";
    }
    ?>

</table>


<?php
    require "footer.php";
?>