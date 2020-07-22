<?php
include 'dbh.inc.php';
session_start();
if (!$conn) {
    die("Error connecting to DB: " . mysqli_connect_error());
}
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else {
    if (isset($_POST['action'])) {
        $type = $_POST['type'];
        $postid = (int)$_POST['post_id'];
        $poster = $_POST['poster'];
        $voter =  $_SESSION['username'];
        $action = $_POST['action'];
        $cvotedate = date("Y-m-d H:i:s");
        $notifistatus = "unread";
        if ($poster !== $voter) {
            switch ($action) {
                case 'like':
                    $rs1 = mysqli_query($conn,"SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'like' AND voter = '".$voter."'");
                    if (mysqli_fetch_array($rs1)[0]> 0) {
                        $sql = "DELETE FROM vote  WHERE post_id = '".$postid."' AND voter = '".$voter."'";
                        mysqli_query($conn,$sql);
                    }
                    else {
                        $notifitype = "plike";
                        $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$voter."', '".$poster."', '".$cvotedate."','". $notifitype."' ,'".$postid."', '".$notifistatus."' )";
                        mysqli_query($conn, $sqlnotifi);
                        $sql = "INSERT INTO vote (poster, post_id, action, voter)
                               VALUES ('".$poster."', '".$postid."', '".$action."', '".$voter."')
                               ON DUPLICATE KEY UPDATE action='like'";
                        mysqli_query($conn, $sql);
                        $sql = "UPDATE posts SET likes = (SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'like') WHERE post_id = '".$postid."'";
                        mysqli_query($conn, $sql);
                        $sql = "UPDATE posts SET dislikes = (SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'dislike') WHERE post_id = '".$postid."'";
                        mysqli_query($conn, $sql);
                    }

                    break;
                case 'dislike':
                    $rs2 = mysqli_query($conn,"SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'dislike' AND voter = '".$voter."'");
                    if (mysqli_fetch_array($rs2)[0]> 0) {
                        $sql = "DELETE FROM vote  WHERE post_id = '".$postid."' AND voter = '".$voter."'";
                        mysqli_query($conn,$sql);
                    }
                    else {
                        $notifitype = "pdislike";
                        $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$voter."', '".$poster."', '".$cvotedate."','". $notifitype."' ,'".$postid."', '".$notifistatus."' )";
                        $sql = "INSERT INTO vote (poster, post_id, action, voter)
                               VALUES ('".$poster."', '".$postid."', '".$action."', '".$voter."')
                               ON DUPLICATE KEY UPDATE action='dislike'";

                        mysqli_query($conn, $sql);

                        $sql = "UPDATE posts SET dislikes = (SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'dislike') WHERE post_id = '".$postid."'";
                        mysqli_query($conn, $sql);
                        $sql = "UPDATE posts SET likes = (SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'like') WHERE post_id = '".$postid."'";
                        mysqli_query($conn, $sql);
                    }
                    break;
                default:
                    break;
            }

            $postlikes = "SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'like'";
            $resultpostlikes = mysqli_query($conn, $postlikes) or die("Error: ".mysqli_error($conn));
            $resultpostlikesrs = mysqli_fetch_array($resultpostlikes)[0];

            $postdislikes = "SELECT COUNT(*) FROM vote WHERE post_id = '".$postid."' AND action = 'dislike'";
            $resultpostdislikes = mysqli_query($conn, $postdislikes) or die("Error: ".mysqli_error($conn));
            $resultpostdislikesrs = mysqli_fetch_array($resultpostdislikes)[0];

            $totalpostpoints = $resultpostlikesrs - $resultpostdislikesrs;

            $sql = "UPDATE posts SET points = '".$totalpostpoints."' WHERE post_id = '".$postid."'";

            mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

            $userlikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$poster."' AND action = 'like'";
            $resultuserlikes = mysqli_query($conn, $userlikes) or die("Error: ".mysqli_error($conn));
            $resultuserlikesrs = mysqli_fetch_array($resultuserlikes)[0];

            $userdislikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$poster."' AND action = 'dislike'";
            $resultuserdislikes = mysqli_query($conn, $userdislikes) or die("Error: ".mysqli_error($conn));
            $resultuserdislikesrs = mysqli_fetch_array($resultuserdislikes)[0];

            $totaluserpoints = $resultuserlikesrs - $resultuserdislikesrs;

            $sql = "UPDATE users set points = '".$totaluserpoints."' WHERE name = '".$poster."'";

            mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
        }
    }
}
