<?php
    require "header.php";
?>


<div class="wrapper">


<h1>Statistics</h1>

<div class="table">

<table>
    <tr>
        <th>Player</th>
        <th>Games played</th>
        <th>Games won</th>
        <th>Angmar played</th>
        <th>Angmar won</th>
        <th>Dwarves played</th>
        <th>Dwarves won</th>
        <th>Elves played</th>
        <th>Elves won</th>
        <th>Goblins played</th>
        <th>Goblins won</th>
        <th>Men played</th>
        <th>Men won</th>
        <th>Mordor played</th>
        <th>Mordor won</th>
        <th>Isengard played</th>
        <th>Isengard won</th>
    </tr>
    <?php

    include_once 'includes/dbh.inc.php';

    $sql = "SELECT uidUsers, played, won, played_ang, won_ang, played_dwa, won_dwa, played_elv, won_elv, played_gob, won_gob, played_men, won_men, played_mor, won_mor, played_ise, won_ise from leaderbord";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc() ) {
            echo "<tr><td>". $row["uidUsers"] ."</td><td>".  $row["played"] ."</td><td>". $row["won"] ."</td><td>". $row["played_ang"] ."</td><td>". $row["won_ang"] ."</td><td>". $row["played_dwa"] ."</td><td>". $row["won_dwa"] ."</td><td>". $row["played_elv"] ."</td><td>". $row["won_elv"] ."</td><td>". $row["played_gob"] ."</td><td>". $row["won_gob"] ."</td><td>". $row["played_men"] ."</td><td>". $row["won_men"] ."</td><td>". $row["played_mor"] ."</td><td>". $row["won_mor"] ."</td><td>". $row["played_ise"] ."</td><td>". $row["won_ise"] ."</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "0 result";
    }
    ?>

</table>
</div>

</div>

<?php
    require "footer.php";
?>
