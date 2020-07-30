<?php
include "dbh.inc.php";
session_start();
if (isset($_POST['postdelete'])){
    $postid = $_POST['postid'];
    $sqld = "DELETE FROM posts WHERE post_id='".$postid."' AND points ='0'";
    mysqli_query($conn, $sqld);
    $sqld = "DELETE FROM vote WHERE post_id='".$postid."'";
    mysqli_query($conn, $sqld);


    $userlikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$_SESSION['username']."' AND action = 'like'";
    $resultuserlikes = mysqli_query($conn, $userlikes) or die("Error: ".mysqli_error($conn));
    $resultuserlikesrs = mysqli_fetch_array($resultuserlikes)[0];

    $userdislikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$_SESSION['username']."' AND action = 'dislike'";
    $resultuserdislikes = mysqli_query($conn, $userdislikes) or die("Error: ".mysqli_error($conn));
    $resultuserdislikesrs = mysqli_fetch_array($resultuserdislikes)[0];

    $totaluserpoints = $resultuserlikesrs - $resultuserdislikesrs;

    $sql = "UPDATE users set points = '".$totaluserpoints."' WHERE name = '".$_SESSION['username']."'";

    mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
}