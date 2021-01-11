<?php
    
if ( isset($_POST['login-submit']) ) {

    require 'dbh.inc.php'; // no path needed, we are in includes already

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];


    // check for empty fields
    if ( empty($mailuid) || empty($password) ) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init( $conn );


        if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {

            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param( $stmt, "ss", $mailuid, $mailuid );
            mysqli_stmt_execute( $stmt );
            $stmt->store_result();
            $stmt->bind_result($idUsers, $uidUsers, $emailUsers, $pwdUsers); // binds result to these variables
            // $result = mysqli_stmt_get_result( $stmt );
            $result = $stmt->fetch();

            // if ( $row = mysqli_fetch_assoc($result) ) {
            if ( $result ) {
                // $pwdCheck = password_verify( $password, $row['pwdUsers'] ); // gives true of false
                $pwdCheck = password_verify( $password, $pwdUsers ); // gives true of false
                if ( $pwdCheck == false ) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit(); 
                }
                else if ( $pwdCheck == true ) { // lets login! we need global variable, a session
                    session_start();
                    // $_SESSION['userId'] = $row['idUsers'];
                    // $_SESSION['userUid'] = $row['uidUsers'];

                    $_SESSION['userId'] = $idUsers;
                    $_SESSION['userUid'] = $uidUsers;

                    header("Location: ../index.php?login=success");
                    exit();     

                }
                else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();       
                }

            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();

            }

        }

    }


}
else {
    header("Location: ../index.php");
    exit();
}