<?php
    
if ( isset($_POST['signup-submit']) ) {

    // require 'dbh-user.inc.php'; // no path needed, we are in includes already
    require 'dbh.inc.php'; // no path needed, we are in includes already
    // i made special user dbh handler

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // check for empty fields
    if ( empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email); // keep mail and name filled in
        exit(); // if mistake is made, stop
    }
    // check for invalid uid & pwd
    else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    // check for valid email
    else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    // check for valid username
    else if ( !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    // check password
    else if ( $password !== $passwordRepeat ) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    // check if username is taken
    else {
        // prepare statement
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init( $conn ); 

        if ( !mysqli_stmt_prepare($stmt, $sql) ) {
            header("Location: ../signup.php?error=sqlerror");
            exit();            
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username); // amounts of s depends on the number of ?
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);


            $resultCheck = mysqli_stmt_num_rows($stmt);


            if ( $resultCheck > 0 ) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();      
            }
            else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if ( !mysqli_stmt_prepare($stmt, $sql) ) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();            
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    $sql_lead = "INSERT INTO leaderbord (uidUsers) VALUES (?)";
                    $stmt_lead = mysqli_stmt_init($conn);
                    if ( !mysqli_stmt_prepare($stmt_lead, $sql_lead) ) {
                        header("Location: ../signup.php?error=sqlerrorleader");
                        exit();            
                    }
                    else {
                        mysqli_stmt_bind_param($stmt_lead, "s", $username);
                        mysqli_stmt_execute($stmt_lead);

                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}






