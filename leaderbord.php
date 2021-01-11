<?php
    require "header.php";
?>


<h1>Leaderbord</h1>


<table>
    <tr>
        <th>Player</th>
        <th>Games won</th>
        <th>Games played</th>
    </tr>
    <?php

    include_once 'includes/dbh.inc.php';

    $sql = "SELECT uidUsers, won, played from leaderbord";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc() ) {
            echo "<tr><td>". $row["uidUsers"] ."</td><td>".  $row["won"] ."</td><td>". $row["played"] ."</td></tr>";
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
