<?php

    include_once 'dbh.inc.php';

    $players = [ $_POST['player1'], $_POST['player2'], $_POST['player3'], $_POST['player4'], $_POST['player5'], $_POST['player6'] ];
    $factions = [ $_POST['faction1'], $_POST['faction2'], $_POST['faction3'], $_POST['faction4'], $_POST['faction5'], $_POST['faction6'] ];
    $teams = [ $_POST['team1'], $_POST['team2'], $_POST['team3'], $_POST['team4'], $_POST['team5'], $_POST['team6'] ];

    $w = $_POST['winner'];

    $num_players = 0;

    foreach ($players as $key=>$player) {

        if ( !empty($player) ) {

            foreach ( $players as $key_t=>$player_t ) {
                if ( $key != $key_t ) {
                    if ( $player_t == $player ) {
                        header("Location: ../newgame.php?error=duplicateuser");
                        exit();  
                    }
                }
            }


            if ( empty($factions[$key]) ) {
                header("Location: ../newgame.php?error=nofaction");
                exit();  
            }

            if ( empty($teams[$key]) ) {
                header("Location: ../newgame.php?error=noteam");
                exit();  
            }

            $num_players+=1;

            // prepare statement
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init( $conn ); 

            if ( !mysqli_stmt_prepare($stmt, $sql) ) {
                header("Location: ../newgame.php?error=sqlerror");
                exit();            
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $player); // amounts of s depends on the number of ?
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);


                $resultCheck = mysqli_stmt_num_rows($stmt);


                if ( $resultCheck == 0 ) {
                    header("Location: ../newgame.php?error=usernotexist");
                    exit();
                }      
            }
        }
    }

    if ( $num_players < 2 ) {
        header("Location: ../newgame.php?error=notenoughplayers");
        exit();
    }

    $winner_in_form = 0;
    foreach ($teams as $team) {

        if ( $team == $w ) {
            $winner_in_form = 1;
        }
    }
    if ( $winner_in_form == 0 ) {
        header("Location: ../newgame.php?error=nowinner");
        exit();
    }

    $sql = "INSERT INTO games (player1, faction1, team1, player2, faction2, team2, player3, faction3, team3, player4, faction4, team4, player5, faction5, team5, player6, faction6, team6, winner) VALUES ('$players[0]', '$factions[0]', '$teams[0]', '$players[1]', '$factions[1]', '$teams[1]', '$players[2]', '$factions[2]', '$teams[2]', '$players[3]', '$factions[3]', '$teams[3]', '$players[4]', '$factions[4]', '$teams[4]', '$players[5]', '$factions[5]', '$teams[5]','$w');";
    $result = mysqli_query($conn,$sql);

    foreach ($players as $key=>$player) {

        if ( !empty($player) ) {
            if ( $teams[$key] == $w ) {
                $sql = "UPDATE leaderbord set played = played + 1, won = won + 1 WHERE uidUsers = '$player';";
                $result = mysqli_query($conn,$sql);
                if ( $factions[$key] == "Goblins" ) {
                    $sql = "UPDATE leaderbord set played_gob = played_gob + 1, won_gob = won_gob + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Angmar" ) {
                    $sql = "UPDATE leaderbord set played_ang = played_ang + 1, won_ang = won_ang + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Dwarves" ) {
                    $sql = "UPDATE leaderbord set played_dwa = played_dwa + 1, won_dwa = won_dwa + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Elves" ) {
                    $sql = "UPDATE leaderbord set played_elv = played_elv + 1, won_elv = won_elv + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Men" ) {
                    $sql = "UPDATE leaderbord set played_men = played_men + 1, won_men = won_men + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Mordor" ) {
                    $sql = "UPDATE leaderbord set played_mor = played_mor + 1, won_mor = won_mor + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Isengard" ) {
                    $sql = "UPDATE leaderbord set played_ise = played_ise + 1, won_ise = won_ise + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }

            }
            else {
                $sql = "UPDATE leaderbord set played = played + 1 WHERE uidUsers = '$player';";
                $result = mysqli_query($conn,$sql);
                if ( $factions[$key] == "Goblins" ) {
                    $sql = "UPDATE leaderbord set played_gob = played_gob + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Angmar" ) {
                    $sql = "UPDATE leaderbord set played_ang = played_ang + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Dwarves" ) {
                    $sql = "UPDATE leaderbord set played_dwa = played_dwa + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Elves" ) {
                    $sql = "UPDATE leaderbord set played_elv = played_elv + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Men" ) {
                    $sql = "UPDATE leaderbord set played_men = played_men + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Mordor" ) {
                    $sql = "UPDATE leaderbord set played_mor = played_mor + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }
                else if ( $factions[$key] == "Isengard" ) {
                    $sql = "UPDATE leaderbord set played_ise = played_ise + 1 WHERE uidUsers = '$player';";
                    $result = mysqli_query($conn,$sql);
                }

            }

        }
    }

    header("Location: ../newgame.php?signup=success");




