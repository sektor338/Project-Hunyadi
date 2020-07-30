<?php
session_start();
include 'dbh.inc.php';
if (isset($_POST['user'])){
    $user = $_POST['user'];
    $sql = "UPDATE notifications SET notifistatus = 'read' WHERE reciever = '".$user."'";
    $sqlr = mysqli_query($conn, $sql);
}