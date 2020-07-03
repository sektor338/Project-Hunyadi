<?php
include "dbh.inc.php";
session_start();
$username = $_SESSION['username'];
if (isset($_POST['upload'])){
    $file = $_FILES['profile_picture'];
    $fileName = $_FILES['profile_picture']['name'];
    $fileTmpName = $_FILES['profile_picture']['tmp_name'];
    $fileSize = $_FILES['profile_picture']['size'];
    $fileError = $_FILES['profile_picture']['error'];
    $fileType = $_FILES['profile_picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    if ($_SESSION['patreon'] != "pictures/ranks and insignia/Sleeve(parka)/trans.png" || $_SESSION['username'] == "sektor338"){
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
    }
    else{
        $allowed = array('jpg', 'jpeg', 'png');
    }
    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 10000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "pictures/profile pictures/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $previousprofpic = "SELECT profile_pic FROM users WHERE name = '".$username."'";
                $resultpreviousprofpic = mysqli_query($conn, $previousprofpic) or die("Error: ".mysqli_error($conn));
                $rspreviousprofpic = mysqli_fetch_array($resultpreviousprofpic)[0];

                unlink("pictures/profile pictures/".$rspreviousprofpic);
                $sql = "UPDATE users SET profile_pic = '".$fileNameNew."' WHERE name = '".$username."'";
                mysqli_query($conn, $sql);
                header('Location: /settings.php');
            }
            else{
                echo "Your file is too big";
            }
        }
        else{
            echo 'Error';
        }
    }
    else{
        echo "You can only upload images";
    }
}
if (isset($_POST['descup'])) {
    $desc = mysqli_real_escape_string($conn, $_POST['userdesc']);
    if(!preg_match("/<>/", $desc)) {
        $sql = "UPDATE users SET user_desc = '" . $desc . "' WHERE name = '" . $username . "'";
        mysqli_query($conn, $sql);
        header('Location: /settings.php');
    }
    else{
        echo "Don't use < > you fuck";
    }
}
if (isset($_POST['emailup'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "UPDATE users SET email = '".$email."' WHERE name = '".$username."'";
    mysqli_query($conn, $sql);
    header('Location: /settings.php');
}
if (isset($_POST['passwdup'])) {
    $password = mysqli_real_escape_string($conn, $_POST['passwd1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['passwd2']);

    if (!preg_match("/^[a-zA-Z1-9_]*$/", $username) || !preg_match("/^[a-zA-Z1-9_]*$/", $password)) {
        header("Location: settings.php?password=dontUseSpacesatUsernameAndAtPassword");
        exit();
    }
    else{
        if ($password !== $password2) {
            header("Location: settings.php?passwordsNotTheSame");
            exit();
        }
        else{
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET pwd = '".$hashedPwd."' WHERE name = '".$username."'";
            mysqli_query($conn, $sql);
            header('Location: /settings.php');
        }
    }


}