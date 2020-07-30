<?php
session_start();
date_default_timezone_set('Europe/Budapest');
include "dbh.inc.php";
if (isset($_POST['friendrequest'])){
    $sender = $_SESSION['username'];
    $receiver = $_POST['receiver'];
    $fdate = date("Y-m-d H:i:s");
    $fsql = "INSERT INTO friend_request (sender, reciever, fdate, status)
    VALUES ('".$sender."', '".$receiver."', '".$fdate."', 'pending')";
    mysqli_query($conn, $fsql);

    $sql = "SELECT friendrid FROM friend_request WHERE sender='".$sender."' AND reciever='".$receiver."'";
    $sqlrs = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($sqlrs);

    $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$sender."', '".$receiver."', '".$fdate."','friendreq' ,'".$row[0]."', 'unread' )";
    mysqli_query($conn, $sqlnotifi);
}

if (isset($_POST['friendaction'])){
    $friendrid = $_POST['friendrid'];
    $fdate = date("Y-m-d H:i:s");
    $sql = "SELECT sender FROM friend_request WHERE friendrid='".$friendrid."'";
    $sqlr = mysqli_query($conn, $sql);
    $sqlrs = mysqli_fetch_row($sqlr);
    switch ($_POST['friendaction']) {
        case "accept":
            $sql = "UPDATE friend_request SET status='accepted' WHERE friendrid='".$friendrid."'";
            mysqli_query($conn, $sql);
            $sql = "INSERT INTO friends (user_one, user_two, startdate, friendreqid) 
                    VALUES ('".$sqlrs[0]."', '".$_SESSION['username']."', '".$fdate."', '".$friendrid."')";
            mysqli_query($conn, $sql);
            break;
        case "deny":
            $sql = "DELETE FROM friend_request WHERE friendrid='".$friendrid."'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM notifications WHERE contentid='".$friendrid."' AND notifitype='friendreq'";
            mysqli_query($conn, $sql);
            break;
        case "block":
            $sql = "UPDATE friend_request SET status='blocked' WHERE friendrid='".$friendrid."'";
            mysqli_query($conn, $sql);
            break;
        case "fublock":
            $sql = "UPDATE friend_request SET status='blocked' WHERE friendrid='".$friendrid."'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM notifications WHERE contentid='".$friendrid."' AND notifitype='friendreq'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM friends WHERE friendreqid='".$friendrid."'";
            mysqli_query($conn, $sql);
            break;
        case "fudeny":
            $sql = "DELETE FROM friend_request WHERE friendrid='".$friendrid."'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM notifications WHERE contentid='".$friendrid."' AND notifitype='friendreq'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM friends WHERE friendreqid='".$friendrid."'";
            mysqli_query($conn, $sql);
            break;
    }
}