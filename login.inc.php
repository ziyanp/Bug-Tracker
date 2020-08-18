<?php 

if(isset($_POST['login-submit'])) {

    $conn = mysqli_connect('localhost','ziyan', 'test1234', 'bugbyte projects');

    if(!$conn) {
        echo 'Connection Error: '.mysqli_connect_error();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if(empty($username) || empty($password)) {
        header('Location: login.php?error=emptyfields');
        exit();

    }
    else {
        $sql = "SELECT * FROM users WHERE username=? OR userEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: login.php?error=sqlerror');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['userPassword']);
                if($pwdCheck == false) {
                    header('Location: login.php?error=wrongpassword');
                    exit();
                }
                else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];

                    header('Location: index.php?login=success');
                    exit();


                }
                else {
                    header('Location: login.php?error=wrongpassword');
                    exit();
                }

            }
            else {
                header('Location: login.php?error=nouser');
                exit();

            }
        }




    }
}
else 
{
    header('Location: login.php');
    exit();
}