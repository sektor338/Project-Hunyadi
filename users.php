<?php
if ($_GET['user'] == '') {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script type="text/javascript" src="friend.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>

<main>
    <center>
        <div id="announcements">
            <?php include 'announcements.php'; ?>
        </div>
    </center>
    <?php
    if (isset($_GET['user'])) {
        include_once 'dbh.inc.php';
        $sql = "SELECT * FROM users WHERE name = '" . $_GET['user'] . "'";
        $userrs = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($userrs);
        if ($user['profile_pic'] == "trans.png") {
            $dest = "pictures/ranks and insignia/Sleeve(parka)";
        } else {
            $dest = "pictures/profile pictures";
        }
        $fulldest = $dest . "/" . $user['profile_pic'];
        echo "                  <div class='maindiv' id='userdiv'>

                                                <div class='usera'>
                                                      <img class='img' id='profile_picture' src='" . $fulldest . "' alt='Profile picture' id='userpic'>
                                                </div>
                                                <div class='usera'>
                                                      <a id='username'>";
        echo $user['name'];
        echo "</a>
                                                      <a id='userpoints'>";
        echo $user['points'];
        echo "</a>";
        if (isset($_SESSION['username'])){
        $sqlfr = "SELECT * FROM friend_request WHERE sender = '" . $_SESSION['username'] . "' AND reciever = '" . $user['name'] . "'  OR reciever = '" . $_SESSION['username'] . "' AND sender = '" . $user['name'] . "'";
        $sqlrsfr = mysqli_query($conn, $sqlfr);
        $friendsql = mysqli_fetch_array($sqlrsfr);
        if ($_SESSION['username'] != $user['name']) {
            if ($friendsql[0] == 0 && $friendsql['status'] != "blocked") {
                echo "<img id='friendaction' class='" . $_SESSION['username'] . "' onclick='friendreq()' src='pictures/icons/addf.png' alt='addfriend'>";
            } else {
                if ($friendsql['status'] == "accepted") {
                    echo "<img id='friendaction' class='friendbtns' src='pictures/icons/deletef.png' name='" . $friendsql['friendrid'] . "' onclick='fudeny()' alt='deletefriend'>";
                    echo "<img id='friendaction' class='friendbtns' src='pictures/icons/block.png' name='" . $friendsql['friendrid'] . "' onclick='fublock()' alt='block'>";
                }
            }
        }
    }

        echo "</div>
                                                <div id='sleeves_div'>
                                                      <img class='insignia img' id='collar_badges' src='" . $user['collar_badges'] . "' alt='Collar badges'>
                                                      <img class='insignia img' id='sleeves' src='" . $user['shoulder_straps'] . "' alt='Shoulder straps and sleeves'>
                                                      <img class='insignia img' id='parka' src='" . $user['parka'] . "' alt='Sleeve(parka)'>

                                                </div>";
        if ($user['patreon'] !== 'pictures/ranks and insignia/Sleeve(parka)/trans.png') {
            echo "<div id='rewards'>
                                            <img id='reward' src='" . $user['patreon'] . "' alt='Patreon'>
                                      </div>";
        }

        echo "<a id='description'>";
        echo $user['user_desc'];
        echo "</a>
                                          </div>";
    } else {
        echo '<div class="maindiv" id="userdiv">
                                    <a href="https://www.patreon.com/pannoniait" target="_blank"><img src="pictures\icons\Patreon-Support-Button.png" style="height: 120px; width: 300px;"></a>
                              </div>';
    }
    ?>

    <?php
    include 'topuser.php';
    ?>

    <center>

        <?php
        include_once 'dbh.inc.php';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $size = 10;
        $offset = ($page - 1) * $size;

        $total_pages_sql = "SELECT COUNT(*) FROM posts WHERE poster = '" . $user['name'] . "'";
        $result = mysqli_query($conn, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $size);
        function paginate($total_rows, $page, $size, $total_pages)
        {
            $markup = "";
            $page1 = 1;
            $page2 = $page + 1;
            $page3 = $page - 1;
            if ($page == 1) {
                $firstdisable = "disabled";
            } else {
                $firstdisable = "enabled";
            }
            if ($page == 2) {
                $seconddisable = "disabled";
            } else {
                $seconddisable = "enabled";
            }
            if ($page == 1 || $page == 2 || $page == 3) {
                $thirddisable = "disabled";
            } else {
                $thirddisable = "enabled";
            }
            if ($page >= $total_pages - 2) {
                $lastdisable = "disabled";
            } else {
                $lastdisable = "enabled";
            }
            if ($page >= $total_pages - 1) {
                $last1disable = "disabled";
            } else {
                $last1disable = "enabled";
            }
            if ($page == $total_pages || $page == 1) {
                $last2disable = "disabled";
            } else {
                $last2disable = "enabled";
            }

            $usern = $_GET['user'];

            $markup .= "<li class='page-item enabled'>
                                         <a class='page-link' href=\"?user=$usern&page=$page1\">$page1</a>
                                         </li>";
            $markup .= "<li class='page-item " . $thirddisable . "'>
                                         <a class='page-link " . $thirddisable . "'>...</a>
                                         </li>";
            $markup .= "<li class='page-item " . $firstdisable . "'>
                                         <a class='page-link " . $firstdisable . " " . $seconddisable . "' href=\"?user=$usern&page=$page3\">$page3</a>
                                         </li>";
            $markup .= "<li class='page-item " . $last2disable . "'>
                                         <a class='page-link " . $last2disable . "' href=\"?user=$usern&page=$page\">$page</a>
                                         </li>";
            $markup .= "<li class='page-item " . $last1disable . "'>
                                         <a class='page-link " . $last1disable . "' href=\"?user=$usern&page=$page2\">$page2</a>
                                         </li>";
            $markup .= "<li class='page-item " . $lastdisable . "'>
                                         <a class='page-link " . $lastdisable . "'>...</a>
                                         </li>";
            $markup .= "<li class='page-item enabled'>
                                         <a class='page-link' href=\"?user=$usern&page=$total_pages\">$total_pages</a>
                                         </li>";
            return $markup;

        }

        $sql = "SELECT * FROM posts WHERE poster = '" . $_GET['user'] . "' ORDER BY uploaddate DESC LIMIT $offset, $size";
        $res_data = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));
        while ($row = mysqli_fetch_array($res_data)) {
            echo "
                            <div class='maindiv " . $row['post_id'] . "' id='postdiv'>
                                <div class='".$row['post_id']." titlediv'>
                                    <a class='".$row['post_id']." titlea' href='post.php?postid=" . $row['post_id'] . "'>" . $row['title'] . "</a>
                                </div>";
            if (strtolower(substr($row['image'], -3)) == "mp4" || strtolower(substr($row['image'], -4)) == "webm" || strtolower(substr($row['image'], -3)) == "mov") {
                echo " <video id='postimg' src='pictures/posts/" . $row['image'] . "' controls> Something went wrong :( </video>";
            } else {
                echo "<img src='pictures/posts/" . $row['image'] . "' alt='postimg' id='postimg'>";
            }
            echo "
<div id='postleft' style='display:inline-block;'>
<a class='postpoints' id='" . $row['post_id'] . "' style='height: 35px; width: 35px; vertical-align:super; font-size:25px;'>" . $row['points'] . "</a>";
            if (isset($_SESSION['username'])) {
                if ($row['poster'] == $_SESSION['username']) {
                    echo "<img id='postedit' class='" . $row['post_id'] . "' style='height: 35px; width: 35px; cursor: pointer;' onclick='postedit()' src='pictures/icons/edit.png'>";
                } else {

                    echo "
<img class='" . $row['post_id'] . " upvote' name='" . $row['poster'] . "' style='height: 35px; width: 35px; cursor: pointer;' onclick='upvotef()' src='";
                    if (!isset($_SESSION['username'])) {
                        echo "pictures/icons/upvoteb.png";
                    } else {
                        $rs1 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '" . $row['post_id'] . "' AND voter = '" . $_SESSION['username'] . "'");
                        if (mysqli_fetch_array($rs1)[0] > 0) {
                            $rs2 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '" . $row['post_id'] . "' AND action = 'like' AND voter = '" . $_SESSION['username'] . "'");
                            if (mysqli_fetch_array($rs2)[0] > 0) {
                                echo "pictures/icons/upvoteg.png";
                            } else {
                                echo "pictures/icons/upvoteb.png";
                            }
                        } else {
                            echo "pictures/icons/upvoteb.png";
                        }
                    }
                    echo "'>";
                }
                if ($row['poster'] == $_SESSION['username']) {
                    echo "<img id='postdelete' class='" . $row['post_id'] . "' style='height: 35px; width: 35px; cursor: pointer;' onclick='postpagedelete()' src='pictures/icons/delete.png'>";
                } else {
                    echo " <img class='" . $row['post_id'] . " downvote' name='" . $row['poster'] . "' style='height: 35px; width: 35px; cursor: pointer;' onclick='downvotef()' src='";

                    if (!isset($_SESSION['username'])) {
                        echo "pictures/icons/downvoteb.png";
                    } else {
                        $rs3 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '" . $row['post_id'] . "' AND voter = '" . $_SESSION['username'] . "'");
                        if (mysqli_fetch_array($rs3)[0] > 0) {
                            $rs4 = mysqli_query($conn, "SELECT COUNT(*) FROM vote WHERE post_id = '" . $row['post_id'] . "' AND action = 'dislike' AND voter = '" . $_SESSION['username'] . "'");
                            if (mysqli_fetch_array($rs4)[0] > 0) {
                                echo "pictures/icons/downvoteg.png";
                            } else {
                                echo "pictures/icons/downvoteb.png";
                            }
                        } else {
                            echo "pictures/icons/downvoteb.png";
                        }
                    }
                    echo "'>";
                }

                echo "
<img style='cursor: pointer; height: 35px; width: 35px;' class='" . $row['post_id'] . " comment' onclick='commentsf()' src='pictures/icons/comments.png' alt='comments'>
<img class='" . $row['post_id'] . " report' name='" . $row['poster'] . "' style='height: 35px; width: 35px; cursor: pointer;' onclick='reportf()' src='pictures/icons/report.png'>";
            }
echo "  
</div>
                                <div id='postright'>
                                <a id='postdate'>" . $row['uploaddate'] . "</a>
                                <br>
                                <a id='postera' href='users.php?user=" . $row['poster'] . "'>" . $row['poster'] . "</a>
                                </div>
";
            if (isset($_SESSION['username'])) {
                $sql5 = "SELECT * FROM users WHERE name = '" . $_SESSION['username'] . "'";
                $userrs5 = mysqli_query($conn, $sql5);
                $user5 = mysqli_fetch_array($userrs5);
                if ($user5['profile_pic'] == "trans.png") {
                    $dest = "pictures/ranks and insignia/Sleeve(parka)";
                } else {
                    $dest = "pictures/profile pictures";
                }
                $fulldest = $dest . "/" . $user5['profile_pic'];
                echo "
<div class='" . $row['post_id'] . " commentsec'>
    <div class='commentwrite'>
            <img class='commentwriteprofpic' src='$fulldest' alt='profpic'>
            <div class='commentwritetextboxdiv'>
                <textarea class='" . $row['post_id'] . " commentinput' draggable='false' cols='40' rows='3' maxlength='200'></textarea>
                <br>
                <input type='hidden' class='" . $row['post_id'] . " commenter' value='" . $_SESSION['username'] . "'>
                <input class='" . $row['post_id'] . " commentwritesubmit' type='button' onclick='csubmit()' value='Submit'>
            </div>
    </div>
    <div class='" . $row['post_id'] . " comments'>";
                $commentLimit = 2;
                require "commentsectionmain.php";
                $countcomments = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE post_id = '" . $row['post_id'] . "'");
                if (mysqli_fetch_array($countcomments)[0] > $commentLimit) {
                    echo "<input class='" . $row['post_id'] . " commentload' type='button' onclick='loadcomments()' value='Load comments'>";
                } else {
                    echo "<input style='display: none' type='button' onclick='loadcomments()' value='Load comments'>";
                }
            }
            echo "</div>
                            </div>


                            ";
        }
        ?>
        <?php
        if ($total_pages > 1){
            include_once 'userspaginav.php';
        }
        ?>
    </center>

</main>
<?php include 'footer.php'; ?>
</body>
</html>


<?php /*
<?php
if (isset($_GET['user'])) {
    include_once 'dbh.inc.php';
    $sql = "SELECT * FROM users WHERE name = '".$_GET['user']."'";
    $username = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM users WHERE name = '".$_GET['user']."'";
    $userpoints = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM users WHERE name = '".$_GET['user']."'";
    $userdesc = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM users WHERE name = '".$_GET['user']."'";
    $userrank = mysqli_query($conn, $sql);
*/ ?>
