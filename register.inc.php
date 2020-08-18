<?php

if(isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);


    if(empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($firstName) || empty($lastName)) {
        header("Location: register.php?error=emptyfields");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: register.php?error=invalidemailusername");
        exit();



    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=invalidemail&username=".$username);
        exit();

    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: register.php?error=invalidusername&mail=".$email);
        exit();

    }
    else if($password !== $confirmPassword) {
        header("Location: register.php?error=passwordCheck");
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: register.php?error=sqlerror");
            exit();

        }
        else {
            mysqli_stmt_bind_param($stmt, "s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if(resultCheck>0) {

                header("Location: register.php?error=usernametaken");
                exit();
            }
            else{
                $sql = "INSERT INTO users (username, firstName, lastName, userEmail, userPassword) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: register.php?error=sqlerror");
                    exit();
        
                }
                else {

                    //hash password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $username, $firstName, $lastName, $email,$hashedPwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: register.php?signup=success");
                    exit();
                
                }

            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}
else {
    header('Location: register.php?error=wtf');
    exit();
}