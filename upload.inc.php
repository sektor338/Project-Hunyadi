<?php
date_default_timezone_set('Europe/Budapest');
include "dbh.inc.php";
if (isset($_POST['upload'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);
    $postdate = date("Y-m-d H:i:s");
    $points = 0;
    $user = $_POST['usname'];
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedp = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'webm', 'mov');
    if (in_array($fileActualExt, $allowedp)){
        if ($fileError === 0){
            if ($fileSize < 100000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "pictures/posts/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $insertpost = "INSERT INTO posts (title, tags, image, uploaddate, points, poster, reports, dislikes, likes)
                VALUES ('$title', '$tags', '$fileNameNew', '$postdate', '$points', '$user', '0', '0', '0')";
                mysqli_query($conn, $insertpost);
                header('Location: fresh.php');
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
        echo "You can only upload images and videos";
    }
}