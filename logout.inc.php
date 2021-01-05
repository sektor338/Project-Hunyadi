<?php
if (isset($_POST['logout'])) {
      session_start();
      include 'dbh.inc.php';
    $sql = "UPDATE users SET userstatus='0' WHERE name='".$_SESSION['username']."'";
    $sqlr = mysqli_query($conn,$sql);
      session_unset();
      session_destroy();
      header("Location: index.php");
      exit();
}
