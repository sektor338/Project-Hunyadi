<?php
if(isset($_POST['request'])){
    require "dbh.inc.php";
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "https://eaglesnest88.com/create-new-pwd.php?selector=" .$selector. "&validator=" .bin2hex($token);
    $expire = date("U") + 1800;

    $email = $_POST['email'];
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: https://eaglesnest88.com?SomethingWentWrong");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires)
            VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: https://eaglesnest88.com?SomethingWentWrong");
        exit();
    }
    else{
        $hashed = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashed, $expire);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close();
    $to = $email;
    $subject = "Password reset - Eagle's Nest 88";
    $message = "<p>We recieved a password reset request. In order to reset your password please click on the link down below.
    If you did not make this request, ignore this email. <br>
    Here is your password reset link: <br>
    <a href='".$url."'>'.$url.'</a></p>";
    $headers = "From: Eagle's Nest 88 <u229558066@srv217.main-hosting.eu>\r\n";
    $headers .= "Reply-To: hdsektor38@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
    header("Location: https://eaglesnest88.com/login.php?email=sent");
}
else{
    header("Location: index.php?error");
}