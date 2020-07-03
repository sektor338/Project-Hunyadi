<?php
include "dbh.inc.php";
session_start();
if (isset($_POST['report'])) {
    $postid = $_POST['post_id'];
    $poster = $_POST['poster'];
    $reporter = $_SESSION['username'];
    $report = $_POST['report'];
    if ($poster != $reporter) {
        switch ($report) {
            case 'postreport':
                $checkpostreport = mysqli_query($conn, "SELECT COUNT(*) FROM postreports WHERE postid = '" . $postid . "' AND reporter = '" . $reporter . "'");
                if (mysqli_fetch_array($checkpostreport)[0] == 0) {
                    $sql = "INSERT INTO postreports (postid, poster, reporter)
                    VALUES ('" . $postid . "', '" . $poster . "', '" . $reporter . "')";
                    mysqli_query($conn, $sql);
                    $updatepostreports = "UPDATE posts SET reports = (SELECT COUNT(*) FROM postreports WHERE post_id = '" . $postid . "') WHERE post_id = '" . $postid . "'";
                    mysqli_query($conn, $updatepostreports);
                    $updateuserreports = "UPDATE users SET userreport = (SELECT COUNT(*) FROM postreports WHERE poster = '" . $poster . "') WHERE name = '" . $poster . "'";
                    mysqli_query($conn, $updateuserreports);
                    $countpostreports = mysqli_query($conn, "SELECT COUNT(*) FROM postreports WHERE postid = '".$postid."'");
                    mysqli_query($conn, $countpostreports);/*
                    $dcheckpostreport = mysqli_query($conn, "SELECT COUNT(*) FROM postreports WHERE postid = '" . $postid . "' AND reporter = '" . $reporter . "'");
                    if (mysqli_fetch_array($dcheckpostreport)[0] == 10) {
                        $deletepost = "DELETE FROM posts WHERE post_id = '".$postid."'";
                  }*/
                }
                break;
            case 'commentreport':
                $checkcommentreport = mysqli_query($conn, "SELECT COUNT(*) FROM commentreports WHERE commentid = '" . $postid . "' AND reporter = '" . $reporter . "'");

                if (mysqli_fetch_array($checkcommentreport)[0] == 0) {

                    $creportinsert = "INSERT INTO commentreports (commentid, commenter, reporter)
                    VALUES ('" . $postid . "', '" . $poster . "', '" . $reporter . "')";
                    mysqli_query($conn, $creportinsert);

                    $updatecommentreports = "UPDATE comments SET creports = (SELECT COUNT(*) FROM commentreports WHERE commentid = '" . $postid . "') WHERE comment_id = '" . $postid . "'";
                    mysqli_query($conn, $updatecommentreports);
/*
                    $dcheckcommentreport = mysqli_query($conn, "SELECT COUNT(*) FROM commentreports WHERE commentid = '" . $postid . "' AND reporter = '" . $reporter . "'");
                    if (mysqli_fetch_array($dcheckcommentreport)[0] == 10) {
                        $deletecomment = "DELETE FROM comments WHERE comment_id = '".$postid."'";
                  }*/
                }
                break;
        }


        $countcommentreports ="SELECT COUNT(*) FROM commentreports WHERE commenter = '".$poster."'";
        $r1countcommentreports = mysqli_query($conn, $countcommentreports);
        $r2countcommentreports = mysqli_fetch_array($r1countcommentreports)[0];

        $countpostreports = "SELECT COUNT(*) FROM postreports WHERE poster = '".$poster."'";
        $r1countpostreports = mysqli_query($conn, $countpostreports);
        $r2countpostreports = mysqli_fetch_array($r1countpostreports)[0];

        $totalreports = $r2countcommentreports + $r2countpostreports;

        $updateuserreportsc = "UPDATE users SET userreport = '".$totalreports."' WHERE name = '" . $poster . "'";
        mysqli_query($conn, $updateuserreportsc);

/*
        $countuserreports = mysqli_query($conn, "SELECT COUNT(*) FROM postreports WHERE poster = '".$poster."'");
        mysqli_query($conn, $countuserreports);
        if (mysqli_fetch_array($checkpostreport)[0] == 100) {
            $deleteuser = "DELETE FROM users WHERE name = '".$poster."'";
            mysqli_query($conn, $deleteuser);
            $deleteusersposts = "DELETE FROM posts WHERE poster = '".$poster."'";
            mysqli_query($conn, $deleteusersposts);
            $deleteuserscomments = "DELETE FROM comments WHERE commenter = '".$poster."'";
            mysqli_query($conn, $deleteuserscomments);
            $deleteuserspostvotes = "DELETE FROM vote WHERE poster = '".$poster."'";
            mysqli_query($conn, $deleteuserspostvotes);
            $deleteuserscvotes = "DELETE FROM cvote WHERE commenter = '".$poster."'";
            mysqli_query($conn, $deleteuserscvotes);
      }*/

    }
}
