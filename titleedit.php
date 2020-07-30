<?php
require 'dbh.inc.php';
if (isset($_POST['postedit'])){
    $postid = $_POST['postid'];
    $title = $_POST['postedit'];
    echo " <input  class='$postid titleinput' type='text' value='$title'>
       <input class='$postid titlesubmit' type='button' onclick='postedited()' value='save'>";
}
if (isset($_POST['postedited'])) {
    $postid = $_POST['postid'];
    $title = mysqli_real_escape_string($conn, $_POST['postedited']);
    if (!preg_match("/<>/", $title)) {
        echo "<a class='$postid titlea'>$title</a>";
        $sql = "UPDATE posts SET title ='" . $title . "' WHERE post_id = '" . $postid . "'";
        mysqli_query($conn, $sql);
    } else {
        echo "Don't use < > you fuck";
    }
}