<?php
include 'dbh.inc.php';
if (isset($_GET['post_id'])) {
      $postid = (int)$_GET['post_id'];
      $sql = "SELECT points FROM posts WHERE post_id = '".$postid."'";
      $sqlrs = mysqli_query($conn, $sql);
      $sqlresult = mysqli_fetch_array($sqlrs)[0];
      echo $sqlresult;
}
