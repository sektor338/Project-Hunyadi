<?php
if (isset($_POST['pwdresetsubmit'])){
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    if (empty($pwd1) || empty($pwd2)){
        header("Location: index.php?passwordIsEmpty");
    }
    else if ($pwd1 != $pwd2){
        header("Location: index.php?passwordsDoesNotMatch");
    }
    $currentDate = date("U");
    require "dbh.inc.php";

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: https://eaglesnest88.com?SomethingWentWrong");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)){
            echo "Please re-submit your request again.";
        }
        else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);
            if ($tokenCheck === false){
                echo "Something went wrong!";
            }
            else if($tokenCheck === true){
                $tokenEmail = $row['pwdResetEmail'];
                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: https://eaglesnest88.com?SomethingWentWrong");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)){
                        echo "There was an error.";
                    }
                    else{
                        $sql = "UPDATE users SET pwd=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: https://eaglesnest88.com?SomethingWentWrong");
                            exit();
                        }
                        else {
                            $newpwdhash = password_hash($pwd1, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newpwdhash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail =?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: login.php?SomethingWentWrong");
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?PasswordHasBeenUpdated");
                            }
                        }
                    }
                }
            }
        }
    }
}
else{
    header("Location: index.php");
}