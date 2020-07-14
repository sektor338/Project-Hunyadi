<?php
require 'dbh.inc.php';
if (isset($_POST['edittext'])){
$commentid = $_POST['commentid'];
$comment = $_POST['edittext'];
echo " <input  class='$commentid commenteditsavep' type='text' value='$comment'>
       <input class='$commentid commenteditsave' type='button' onclick='cedit()' value='save'>";
}
if (isset($_POST['editedtext'])){
    $commentid = $_POST['commentid'];
    $comment = mysqli_real_escape_string($conn, $_POST['editedtext']);
    if(!preg_match("/<>/", $comment)) {
        echo "<p class='$commentid commentsupperrightdownp'>$comment</p>";
        $sql = "UPDATE comments SET message ='" . $comment . "' WHERE comment_id = '" . $commentid . "'";
        mysqli_query($conn, $sql);
    }
    else{
        echo "Don't use < > you fuck";
    }
}