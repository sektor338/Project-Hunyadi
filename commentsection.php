<?php
require 'dbh.inc.php';
if (isset($_POST['commentlimit'])){
    $commentLimit = $_POST['commentlimit'];
    $postid = $_POST['postid'];
    session_start();
}
        $commentsql = "SELECT * FROM comments WHERE post_id = '".$postid."' ORDER BY comment_date LIMIT $commentLimit";
        $commentres_data = mysqli_query($conn, $commentsql)
        or die("Error: ".mysqli_error($conn));
        while ($commentrow = mysqli_fetch_array($commentres_data)) {
        echo "
        <div class='".$commentrow['post_id']." commentdiv'>
            <div class='commentsupper'>
                <div class='commentsupperleft'>";
                    $cuser1sql = "SELECT * FROM users WHERE name = '".$commentrow['commenter']."'";
                    $cuserrs1 = mysqli_query($conn, $cuser1sql);
                    $cuser1 = mysqli_fetch_array($cuserrs1);
                    if($cuser1['profile_pic'] == "trans.png"){
                    $dest = "pictures/ranks and insignia/Sleeve(parka)";
                    }
                    else{
                         $dest = "pictures/profile pictures";
                    }
                    $fulldest1 = $dest."/".$cuser1['profile_pic'];
                    echo "<img class='commentprofpic' src='$fulldest1' alt='profpic'>
                </div>
                <div class='commentsupperright'>
                    <div class='commentsupperrightup'>
                        <a class='commentsupperrightupname' href=''>".$commentrow['commenter']."</a>
                        <a class='commentsupperrightupdate'>".substr($commentrow['comment_date'], 0, -9)."</a>
                        <a class='".$commentrow['comment_id']." commentsupperrightuppoints'>".$commentrow['cpoints']."</a>
                </div>
                <div class='".$commentrow['comment_id']." commentsupperrightdown'>
                    <p class='".$commentrow['comment_id']." commentsupperrightdownp'>".$commentrow['message']."</p>
                </div>
            </div>
            </div>
        <div class='commentsbottom'>
            <img class='".$commentrow['comment_id']." cupvote' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='cupvotef()' src='";
            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/upvoteb.png";
            }
            else {
                $rs1 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['post_id']."' AND cvoter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($rs1)[0]> 0) {
                    $rs2 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['post_id']."' AND caction = 'like' AND cvoter = '".$_SESSION['username']."'");
                    if (mysqli_fetch_array($rs2)[0]> 0) {
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
echo "'> <img class='".$commentrow['comment_id']." cdownvote' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='cdownvotef()' src='";

            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/downvoteb.png";
            }
            else {
                $rs3 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['post_id']."' AND cvoter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($rs3)[0]> 0) {
                    $rs4 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['post_id']."' AND caction = 'dislike' AND cvoter = '".$_SESSION['username']."'");
                    if (mysqli_fetch_array($rs4)[0]> 0) {
                        echo "pictures/icons/downvoteg.png";
                    }
                    else {
                        echo "pictures/icons/downvoteb.png";
                    }
                }
                else {
                    echo "pictures/icons/downvoteb.png";
                }
            }echo "'>";
                $checkreportedcomments = mysqli_query($conn, "SELECT COUNT(*) FROM commentreports WHERE commentid = '".$commentrow['comment_id']."' AND reporter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($checkreportedcomments)[0] == 0 && $commentrow['commenter'] != $_SESSION['username']) {
                    echo "<img class='".$commentrow['comment_id']." commentsbottombuttons' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='creportf()' src='pictures/icons/report.png'>";
                }
            if ($commentrow['commenter'] == $_SESSION['username']){
                echo "<img style='cursor: pointer;' id='".$commentrow['comment_id']."' class='".$commentrow['post_id']." commentsupperrightupedit' src='pictures/icons/edit.png' alt='editb' onclick='ceditdisplay()'>
                        <img style='cursor: pointer;' id='".$commentrow['comment_id']."' class='".$commentrow['post_id']." commentsupperrightupdelete' src='pictures/icons/delete.png' alt='deleteb' onclick='cdelete()'>";
            }


            echo " </div></div><hr></div>";
        }
        echo "
        
    </div>";
