<?php
date_default_timezone_set('Europe/Budapest');
include 'dbh.inc.php';
session_start();
if(isset($_POST['Submit'])) {
    $commenter = mysqli_real_escape_string($conn, $_POST['commenter']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $post_id = $_POST['postid'];
    $cdate = date("Y-m-d H:i:s");
    $notifitype = "comment";
    $notifistatus = "unread";
    if(!preg_match("/<>/", $comment)){
        $sql = "INSERT INTO comments (post_id, comment_date, message, commenter)
        VALUES ('$post_id', '$cdate', '$comment', '$commenter')";
        mysqli_query($conn, $sql);
        $sqlc = "SELECT poster FROM posts WHERE post_id='".$post_id."'";
        $res_datac = mysqli_query($conn, $sqlc)
        or die("Error: " . mysqli_error($conn));
        $notificid = mysqli_fetch_array($res_datac);
        if ($notificid[0] != $_SESSION['username']){
            $sqlc = "SELECT comment_id FROM comments WHERE post_id='".$post_id."' AND message='".$comment."' AND commenter='".$commenter."'";
            $res_datac = mysqli_query($conn, $sqlc)
            or die("Error: " . mysqli_error($conn));
            $notific = mysqli_fetch_array($res_datac);
            $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$commenter."', '".$notificid[0]."', '".$cdate."','". $notifitype."' ,'".$notific[0]."', '".$notifistatus."' )";
            mysqli_query($conn, $sqlnotifi);
        }
    }

}

if (isset($_POST['dcomment_id'])) {
    $commentid = $_POST['dcomment_id'];
    $getcommentpoints = mysqli_query($conn,"SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."'");
    if (mysqli_fetch_array($getcommentpoints)[0] == 0) {
        $sql = "DELETE FROM comments  WHERE comment_id = $commentid";
        mysqli_query($conn, $sql);
        $sql = "DELETE FROM notifications  WHERE contentid = $commentid";
        mysqli_query($conn, $sql);
    }
}
if (isset($_POST['caction'])) {
    $commentid = (int)$_POST['comment_id'];
    $commenter1 = $_POST['commenter'];
    $cvoter =  $_SESSION['username'];
    $caction = $_POST['caction'];
    $cvotedate = date("Y-m-d H:i:s");
    $notifistatus = "unread";
    if ($commenter1 !== $cvoter) {
        switch ($caction) {
            case 'clike':
                $crs1 = mysqli_query($conn,"SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'clike' AND cvoter = '".$cvoter."'");
                if (mysqli_fetch_array($crs1)[0]> 0) {
                    $sql = "DELETE FROM cvote  WHERE cpost_id = '".$commentid."' AND cvoter = '".$cvoter."'";
                    mysqli_query($conn,$sql);
                    $sql = "DELETE FROM notifications  WHERE contentid = $commentid";
                    mysqli_query($conn, $sql);
                }
                else {
                    $notifitype = "clike";
                    $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$cvoter."', '".$commenter1."', '".$cvotedate."','". $notifitype."' ,'".$commentid."', '".$notifistatus."' )";
                    mysqli_query($conn, $sqlnotifi);


                    $sql = "INSERT INTO cvote (commenter, cpost_id, caction, cvoter)
                               VALUES ('".$commenter1."', '".$commentid."', '".$caction."', '".$cvoter."')
                               ON DUPLICATE KEY UPDATE caction='clike'";
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE comments SET clikes = (SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'clike') WHERE comment_id = '".$commentid."'";
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE comments SET cdislikes = (SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'cdislike') WHERE comment_id = '".$commentid."'";
                    mysqli_query($conn, $sql);
                }

                break;
            case 'cdislike':
                $crs2 = mysqli_query($conn,"SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'cdislike' AND cvoter = '".$cvoter."'");
                if (mysqli_fetch_array($crs2)[0]> 0) {
                    $sql = "DELETE FROM cvote  WHERE cpost_id = '".$commentid."' AND cvoter = '".$cvoter."'";
                    mysqli_query($conn,$sql);
                    $sql = "DELETE FROM notifications  WHERE contentid = $commentid";
                    mysqli_query($conn, $sql);
                }
                else {
                    $notifitype = "cdislike";
                    $sqlnotifi = "INSERT INTO notifications (sender, reciever, notifidate, notifitype, contentid, notifistatus)
                               VALUES ('".$cvoter."', '".$commenter1."', '".$cvotedate."','". $notifitype."' ,'".$commentid."', '".$notifistatus."' )";
                    mysqli_query($conn, $sqlnotifi);


                    $sql = "INSERT INTO cvote (commenter, cpost_id, caction, cvoter)
                               VALUES ('".$commenter1."', '".$commentid."', '".$caction."', '".$cvoter."')
                               ON DUPLICATE KEY UPDATE caction='cdislike'";

                    mysqli_query($conn, $sql);

                    $sql = "UPDATE comments SET cdislikes = (SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'cdislike') WHERE comment_id = '".$commentid."'";
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE comments SET clikes = (SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'clike') WHERE comment_id = '".$commentid."'";
                    mysqli_query($conn, $sql);
                }
                break;
            default:
                break;
        }

        $cpostlikes = "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'clike'";
        $cresultpostlikes = mysqli_query($conn, $cpostlikes) or die("Error: ".mysqli_error($conn));
        $cresultpostlikesrs = mysqli_fetch_array($cresultpostlikes)[0];

        $cpostdislikes = "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentid."' AND caction = 'cdislike'";
        $cresultpostdislikes = mysqli_query($conn, $cpostdislikes) or die("Error: ".mysqli_error($conn));
        $cresultpostdislikesrs = mysqli_fetch_array($cresultpostdislikes)[0];

        $ctotalpostpoints = $cresultpostlikesrs - $cresultpostdislikesrs;

        $sql = "UPDATE comments SET cpoints = '".$ctotalpostpoints."' WHERE comment_id = '".$commentid."'";

        mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));




        $cuserlikes = "SELECT COUNT(*) FROM cvote WHERE commenter = '".$commenter1."' AND caction = 'clike'";
        $cresultuserlikes = mysqli_query($conn, $cuserlikes) or die("Error: ".mysqli_error($conn));
        $cresultuserlikesrs = mysqli_fetch_array($cresultuserlikes)[0];

        $cuserdislikes = "SELECT COUNT(*) FROM cvote WHERE commenter = '".$commenter1."' AND caction = 'cdislike'";
        $cresultuserdislikes = mysqli_query($conn, $cuserdislikes) or die("Error: ".mysqli_error($conn));
        $cresultuserdislikesrs = mysqli_fetch_array($cresultuserdislikes)[0];

        $ctotaluserpoints = $cresultuserlikesrs - $cresultuserdislikesrs;




        $userlikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$commenter1."' AND action = 'like'";
        $resultuserlikes = mysqli_query($conn, $userlikes) or die("Error: ".mysqli_error($conn));
        $resultuserlikesrs = mysqli_fetch_array($resultuserlikes)[0];

        $userdislikes = "SELECT COUNT(*) FROM vote WHERE poster = '".$commenter1."' AND action = 'dislike'";
        $resultuserdislikes = mysqli_query($conn, $userdislikes) or die("Error: ".mysqli_error($conn));
        $resultuserdislikesrs = mysqli_fetch_array($resultuserdislikes)[0];

        $totaluserpoints = $resultuserlikesrs - $resultuserdislikesrs;

        $actotaluserpoints = $totaluserpoints + $ctotaluserpoints;



        $sql = "UPDATE users set points = '".$actotaluserpoints."' WHERE name = '".$commenter1."'";

        mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
       /* include 'rankupdate.php';*/
    }
}

