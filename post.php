
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    include_once 'dbh.inc.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="The best place on the internet">
    <meta name="keywords" content="national socialism, Hitler, funny">
    <meta name="author" content="Martin Mészáros">
    <link href="https://fonts.googleapis.com/css?family=Germania+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="postpage.css">
    <link rel="stylesheet" href="comment.css">
    <?php
    if (isset($_SESSION['username'])) {
        echo '<script type="text/javascript" src="like.js"></script>';
        echo '<script type="text/javascript" src="comment.js"></script>';
        if ($_SESSION['username'] == "LySS"){
            header("Location: auschwitz.php");
        }
    }

    ?>
    <script src="dropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Eagle's Nest</title>

</head>
<body>
<?php include 'navbar.php'; ?>
<main>
    <div class="rightdiv">

    </div>

    <center>

        <?php
        $urlpostid = $_GET['postid'];
        $sql = "SELECT * FROM posts WHERE post_id=$urlpostid";
        $res_data = mysqli_query($conn, $sql)
        or die("Error: ".mysqli_error($conn));
        while ($row = mysqli_fetch_array($res_data)) {
            echo "
                            <div class='".$row['post_id']."' id='postdiv'>
                                <div id='titlediv'>
                                    <a class='titlea' href='post.php?postid=".$row['post_id']."'>".$row['title']."</a>
                                </div>
                                <div id='postimgdiv'>";

            if (strtolower(substr($row['image'], -3)) == "mp4" || strtolower(substr($row['image'], -4)) == "webm" || strtolower(substr($row['image'], -3)) == "mov") {
                echo " <video id='postimg' src='pictures/posts/".$row['image']."' controls> Something went wrong :( </video>";
            }
            else {
                echo "<img id='postimg' src='pictures/posts/".$row['image']."' alt='postimg' >";
            }






            echo "</div>
                                <?php // IDEA: szöveg helyett kép ?>
<div id='postleft' style='display:inline-block;'>
<a class='postpoints' id='".$row['post_id']."' style='height: 35px; width: 35px; vertical-align:super; font-size:25px;'>".$row['points']."</a>


<img class='".$row['post_id']." upvote' name='".$row['poster']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='upvotef()' src='";
            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/upvoteb.png";
            }
            else {
                $rs1 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '".$row['post_id']."' AND voter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($rs1)[0]> 0) {
                    $rs2 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '".$row['post_id']."' AND action = 'like' AND voter = '".$_SESSION['username']."'");
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
            echo "'>


    
<img class='".$row['post_id']." downvote' name='".$row['poster']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='downvotef()' src='";

            if (!isset($_SESSION['username'])) {
                echo "pictures/icons/downvoteb.png";
            }
            else {
                $rs3 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '".$row['post_id']."' AND voter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($rs3)[0]> 0) {
                    $rs4 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '".$row['post_id']."' AND action = 'dislike' AND voter = '".$_SESSION['username']."'");
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
            }
            echo "'>

<img style='cursor: pointer; height: 35px; width: 35px;' class='".$row['post_id']." comment' onclick='commentsf()' src='pictures/icons/comments.png' alt='comments'>";
            if(isset($_SESSION['username'])){
                $checkreportedpost = mysqli_query($conn, "SELECT COUNT(*) FROM postreports WHERE postid = '".$row['post_id']."' AND reporter = '".$_SESSION['username']."'");
                if (mysqli_fetch_array($checkreportedpost)[0] == 0) {
                    echo "<img class='".$row['post_id']." report' name='".$row['poster']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='reportf()' src='pictures/icons/report.png'>";
                }
            }
            else{
                echo "<img class='report' style='height: 35px; width: 35px; cursor: pointer;' src='pictures/icons/report.png'>";
            }
            echo "
</div>
                                <div id='postright'>
                                <a id='postdate'>".$row['uploaddate']."</a>
                                <br>
                                <a id='postera' href='users.php?user=".$row['poster']."'>".$row['poster']."</a>
                                </div>";
            if (isset($_SESSION['username'])) {
                $sql5 = "SELECT * FROM users WHERE name = '".$_SESSION['username']."'";
                $userrs5 = mysqli_query($conn, $sql5);
                $user5 = mysqli_fetch_array($userrs5);
                if($user5['profile_pic'] == "trans.png"){
                    $dest = "pictures/ranks and insignia/Sleeve(parka)";
                }
                else{
                    $dest = "pictures/profile pictures";
                }
                $fulldest = $dest."/".$user5['profile_pic'];
                echo "
<div class='".$row['post_id']." commentsec'>
    <div class='commentwrite'>
            <img class='commentwriteprofpic' src='$fulldest' alt='profpic'>
            <div class='commentwritetextboxdiv'>
                <textarea class='".$row['post_id']." commentinput' draggable='false' cols='40' rows='3' maxlength='200'></textarea>
                <br>
                <input type='hidden' class='".$row['post_id']." commenter' value='".$_SESSION['username']."'>
                <input class='".$row['post_id']." commentwritesubmit' type='button' onclick='csubmit()' value='Submit'>
            </div>
    </div>
    <div class='".$row['post_id']." comments'>";
                $commentLimit = 2;
                $commentsql = "SELECT * FROM comments WHERE post_id = '".$row['post_id']."' ORDER BY comment_date LIMIT $commentLimit";
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
                    ";
                    if ($commentrow['commenter'] == $_SESSION['username']){
                        echo "<img style='cursor: pointer;' id='".$commentrow['comment_id']."' class='".$commentrow['post_id']." commentsupperrightupedit' src='pictures/icons/edit.png' alt='editb' onclick='ceditdisplay()'>
                    <img style='cursor: pointer;' id='".$commentrow['comment_id']."' class='".$commentrow['post_id']." commentsupperrightupdelete' src='pictures/icons/delete.png' alt='deleteb' onclick='cdelete()'>";
                    }
                    echo "
                </div>
                <div class='".$commentrow['comment_id']." commentsupperrightdown'>
                    <p class='".$commentrow['comment_id']." commentsupperrightdownp'>".$commentrow['message']."</p>
                </div>
            </div>
        </div>
        <div class='commentsbottom'>
           <img alt='vote' class='".$commentrow['comment_id']." cupvote' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;' ";
                    if (isset($_SESSION['username'])) {
                        if ($commentrow['commenter'] != $_SESSION['username']) {
                            echo "onclick='cupvotef()' ";
                        }
                    }
                    echo "src='";
                    if (!isset($_SESSION['username'])) {
                        echo "pictures/icons/upvoteb.png";
                    }
                    else {
                        $rs1 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['comment_id']."' AND cvoter = '".$_SESSION['username']."'");
                        if (mysqli_fetch_array($rs1)[0]> 0) {
                            $rs2 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['comment_id']."' AND caction = 'clike' AND cvoter = '".$_SESSION['username']."'");
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
                    echo "'> <img class='".$commentrow['comment_id']." cdownvote' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;'";
                    if (isset($_SESSION['username'])) {
                        if ($commentrow['commenter'] != $_SESSION['username']) {
                            echo "onclick='cdownvotef()' ";
                        }
                    }
                    echo "
src='";

                    if (!isset($_SESSION['username'])) {
                        echo "pictures/icons/downvoteb.png";
                    }
                    else {
                        $rs3 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['comment_id']."' AND cvoter = '".$_SESSION['username']."'");
                        if (mysqli_fetch_array($rs3)[0]> 0) {
                            $rs4 = mysqli_query($conn, "SELECT COUNT(*) FROM cvote WHERE cpost_id = '".$commentrow['comment_id']."' AND caction = 'cdislike' AND cvoter = '".$_SESSION['username']."'");
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
                    if(isset($_SESSION['username'])){
                        $checkreportedcomments = mysqli_query($conn, "SELECT COUNT(*) FROM commentreports WHERE commentid = '".$commentrow['comment_id']."' AND reporter = '".$_SESSION['username']."'");
                        if (mysqli_fetch_array($checkreportedcomments)[0] == 0) {
                            echo "<img class='".$commentrow['comment_id']." commentsbottombuttons' name='".$commentrow['commenter']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='creportf()' src='pictures/icons/report.png'>";
                        }

                    }else{
                        echo "<img class='commentsbottombuttons' style='height: 35px; width: 35px; cursor: pointer;' src='pictures/icons/report.png'>";
                    }
                    echo "</div>
    </div>
    
";
                }
                echo "
</div>";
                echo "<input class='" . $row['post_id'] . " commentload' type='button' onclick='loadcomments()' value='Load comments'>";}
            echo "</div>
                            </div>


                            ";
        }
        ?>
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
