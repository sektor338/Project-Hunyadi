<?php
session_start();
require_once 'dbh.inc.php';
$commentlimit = (int)$_GET['commentlimit'];
            $sqlc1 = "SELECT COUNT(*) FROM comments";
            $res_datac1 = mysqli_query($conn, $sqlc1)
            or die("Error: ".mysqli_error($conn));
            $total_comments = mysqli_fetch_array($res_datac1)[0];

            $sqlc1 = "SELECT * FROM comments WHERE post_id = ".$row['post_id']." ORDER BY comment_date DESC LIMIT $commentlimit";;
            $comments = mysqli_query($conn, $sqlc1);
            if (mysqli_num_rows($comments) > 0) {
                while ($crow = mysqli_fetch_array($comments)) {
                    echo "
<div class='".$crow['comment_id']." accommentdiv'>
           <div class='uppercsec'>
                <div class='acprofpic'>";
                    $sqlacprof = "SELECT * FROM users WHERE name = '".$crow['commenter']."'";
                    $sqlacprofres = mysqli_query($conn, $sqlacprof);
                    $sqlacprofres1 = mysqli_fetch_array($sqlacprofres);
                    if ($sqlacprofres1['profile_pic'] == "trans.png") {
                        $destc = "pictures/ranks and insignia/Sleeve(parka)";
                    } else {
                        $destc = "pictures/profile pictures";
                    }
                    $fulldestc = $destc . "/" . $sqlacprofres1['profile_pic'];
                    echo "
<img class='acprofpicimg' src='".$fulldestc."' alt='acprof_pic'>
                </div>
                <div class='acname'>
                    <a class='acnamea' href=''>".$crow['commenter']."</a>
                </div>
                <div class='acdate'>
                    <a>".$crow['comment_date']."</a>
                </div>
                <div class='acpointsdiv'>
                    <a class='".$crow['comment_id']." acpoints'>".$crow['cpoints']."</a>
                </div>
                <div class='acdelete'>
                    <img class='".$crow['comment_id']." cdelete' name='".$crow['commenter']."' style='height: 20px; width: 20px; cursor: pointer;' onclick='cdelete()' src='pictures/icons/delete.png'>
                </div>
           </div>
           <div class='midcomsec'>
                <div class='accomment'>
                    <p class='accommentp'>".$crow['message']."</p>
                </div>
           </div>
           <div class='lowercomsec'>
                <img class='".$crow['comment_id']." cupvote' name='".$crow['commenter']."' style='height: 20px; width: 20px; cursor: pointer;' onclick='cupvotef()' src='";
            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/upvoteb.png";
            }
            else {
                $crs1 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$crow['comment_id']."' AND cvoter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($crs1)[0]> 0) {
                    $crs2 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$crow['comment_id']."' AND caction = 'clike' AND cvoter = '".$_SESSION['username']."'");
                    if (mysqli_fetch_array($crs2)[0]> 0) {
                        echo "pictures/icons/upvoteg.png";
                    }
                    else {
                        echo "pictures/icons/upvoteb.png";
                    }
                }
                else {
                    echo "pictures/icons/upvoteb.png";
                }
            }
            echo "'>
                <img class='".$crow['comment_id']." cdownvote' name='".$crow['commenter']."' style='height: 20px; width: 20px; cursor: pointer;' onclick='cdownvotef()' src='";
            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/upvoteb.png";
            }
            else {
                $crs3 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$crow['comment_id']."' AND cvoter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($crs3)[0]> 0) {
                    $crs4 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$crow['comment_id']."' AND caction = 'cdislike' AND cvoter = '".$_SESSION['username']."'");
                    if (mysqli_fetch_array($crs4)[0]> 0) {
                        echo "pictures/icons/downvoteg.png";
                    }
                    else {
                        echo "pictures/icons/downvoteb.png";
                    }
                }
                else {
                    echo "pictures/icons/downvoteb.png";
                }
            }
            echo "'>
                <img style='height: 20px; width: 20px; cursor: pointer;' class='".$crow['comment_id']." reply' src='pictures/icons/reply.png' alt='reply'>
                <img alt='report' class='".$crow['comment_id']." report' name='".$crow['commenter']."' style='height: 20px; width: 20px; cursor: pointer;' onclick='creport()' src='pictures/icons/report.png'>
           </div>
           </div>
";
                }
            }