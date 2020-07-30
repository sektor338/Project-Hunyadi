<?php
include_once 'dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
    <script type="text/javascript" src="postaction.js"></script>
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
    include 'usertab.php';
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

                     $total_pages_sql = "SELECT COUNT(*) FROM posts WHERE poster = '".$_SESSION['username']."'";
                     $result = mysqli_query($conn, $total_pages_sql);
                     $total_rows = mysqli_fetch_array($result)[0];
                     $total_pages = ceil($total_rows / $size);

                      function paginate($total_rows, $page, $size, $total_pages)
                      {
                          $markup = "";
                          $page1 = 1;
                          $page2 = $page + 1;
                          $page3 = $page - 1;
                          //for ($i = 0; $i < $total_rows; $i+=$size) {
                          if ($page == 1) {
                              $class1 = 'disabled';
                          } else {
                              $class1 = 'page-link';
                          }
                          $markup .= "<li class=\"page-item\">
                                         <a class='".$class1."' href=\"?page=$page3\">$page3</a>
                                         </li>";
                          $markup .= "<li class=\"page-item\">
                                         <a class=\"page-link\" href=\"?page=$page\">$page</a>
                                         </li>";
                          if ($page >= $total_pages) {
                              $class = 'disabled';
                          } else {
                              $class = 'page-link';
                          }
                          $markup .= "<li class=\"page-item\">
                                         <a class='".$class."'>...</a>
                                         </li>";
                          $markup .= "<li class=\"page-item\">
                                         <a class='".$class."' href=\"?page=$total_pages\">$total_pages</a>
                                         </li>";
                          //$page1++;
                          //}
                          return $markup;
                      }


                     $sql = "SELECT * FROM posts WHERE poster = '".$_SESSION['username']."' ORDER BY uploaddate DESC LIMIT $offset, $size";
                     $res_data = mysqli_query($conn, $sql)
                     or die("Error: ".mysqli_error($conn));
                     while ($row = mysqli_fetch_array($res_data)) {
                         echo "
                            <div class='".$row['post_id']."' id='postdiv'>
                                <div class='".$row['post_id']." titlediv'>
                                    <a class='".$row['post_id']." titlea' href='post.php?postid=".$row['post_id']."'>".$row['title']."</a>
                                </div>";

if (strtolower(substr($row['image'], -3)) == "mp4" || strtolower(substr($row['image'], -4)) == "webm" || strtolower(substr($row['image'], -3)) == "mov") {
echo " <video id='postimg' src='pictures/posts/".$row['image']."' controls> Something went wrong :( </video>";
}
else {
      echo "<img id='postimg' src='pictures/posts/".$row['image']."' alt='postimg' >";
}






                                    echo "
<div id='postleft' style='display:inline-block;'>
<a class='postpoints' id='".$row['post_id']."' style='height: 35px; width: 35px; vertical-align:super; font-size:25px;'>".$row['points']."</a>


<img id='postedit' class='".$row['post_id']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='postedit()' src='pictures/icons/edit.png'>

<img id='postdelete' class='".$row['post_id']."' style='height: 35px; width: 35px; cursor: pointer;' onclick='postdelete()' src='pictures/icons/delete.png'>

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
                require "commentsectionmain.php";
                $countcomments = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE post_id = '".$row['post_id']."'");
                if (mysqli_fetch_array($countcomments)[0] > $commentLimit) {
                    echo "<input class='".$row['post_id']." commentload' type='button' onclick='loadcomments()' value='Load comments'>";
                }
                else{
                    echo "<input style='display: none' type='button' onclick='loadcomments()' value='Load comments'>";
                }}
                         echo "</div>
                            </div>


                            ";
                     }
                      ?>

                      <?php
                      if ($total_pages != 0){
                          include_once 'userspaginav.php';
                      }

                      ?>
    </center>

</main>
<?php include 'footer.php'; ?>
</body>
</html>
