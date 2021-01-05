<?php
include "dbh.inc.php";
session_start();
if (isset($_POST['frlist'])) {
    $sql = "SELECT * FROM friends WHERE user_one ='".$_SESSION['username']."' OR user_two='".$_SESSION['username']."'";
    $sqlr = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($sqlr)) {

        if ($row['user_one'] == $_SESSION['username']){
            $sql12 = "SELECT * FROM users WHERE name = '" . $row['user_two'] . "'";
        }
        else{
            $sql12 = "SELECT * FROM users WHERE name = '" . $row['user_one'] . "'";
        }

        $userrs12 = mysqli_query($conn, $sql12);
        $user = mysqli_fetch_array($userrs12);
        if ($user['profile_pic'] == "trans.png") {
            $dest = "pictures/ranks and insignia/Sleeve(parka)";
        } else {
            $dest = "pictures/profile pictures";
        }
        $fulldest = $dest . "/" . $user['profile_pic'];
        if($user['userstatus'] == "0"){
            $userstatus = "pictures/icons/offline.png";
        }
        else{
            $userstatus = "pictures/icons/online.png";
        }

        echo '<div class="frienddiv" id="'.$user['name'].'" onclick="openchattab()">
                <img id="'.$user['name'].'" class="friendpic" src="'.$fulldest .'" alt="profpic">
                <a id="'.$user['name'].'" class="friendname">';
        if ($row['user_one'] == $_SESSION['username']){
            echo $row['user_two'];
        }
        else{
            echo $row['user_one'];
        }
        echo'</a>
                <img class="friendstatus" src="'.$userstatus.'" alt="online">
                </div>';
    }
}

