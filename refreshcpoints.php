<?php
include 'dbh.inc.php';
if (isset($_GET['comment_id'])) {
    $commentid = (int)$_GET['comment_id'];
    $sql = "SELECT cpoints FROM comments WHERE comment_id = '".$commentid."'";
    $sqlrs = mysqli_query($conn, $sql);
    $sqlresult = mysqli_fetch_array($sqlrs)[0];
    echo $sqlresult;
}
