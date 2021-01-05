<?php
include "dbh.inc.php";
session_start();
if (isset($_POST['sendmessage'])){
    if ($_POST['sendmessage'] != ''){
        $reciever = mysqli_real_escape_string($conn, $_POST['receiver']);
        $message = mysqli_real_escape_string($conn, $_POST['sendmessage']);
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO chat (sender, reciever, date, type, message, status)
            VALUES ('".$_SESSION['username']."', '".$reciever."', '".$date."', 'user', '".$message."', 'unseen')";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST['refresh'])){
    $sqluser = "SELECT * FROM users WHERE name = '".$_POST['url']."'";
    $sqluserrs = mysqli_query($conn, $sqluser);
    $userchat = mysqli_fetch_array($sqluserrs);
    if ($userchat['profile_pic'] == "trans.png") {
        $dest = "pictures/ranks and insignia/Sleeve(parka)";
    } else {
        $dest = "pictures/profile pictures";
    }
    $fulldest = $dest . "/" . $userchat['profile_pic'];
    $sql = "SELECT * FROM chat WHERE sender='".$_SESSION['username']."' AND reciever='".$_POST['url']."'
        OR sender='".$_POST['url']."' AND reciever='".$_SESSION['username']."'";
    $sqlr = mysqli_query($conn, $sql)
    or die("Error: ".mysqli_error($conn));
    while ($chatrow = mysqli_fetch_array($sqlr)) {
        if ($chatrow['sender'] == $_SESSION['username']) {
            echo '
                    <div id="chatright1" class="chatrightdiv">
                        <p class="chatmessage">' . $chatrow['message'] . '</p>
                    </div>
                ';
        } else {
            echo '
                     <div id="chatleft1" class="chatleftdiv">
                        <img id="messageprofpic1" class="messageprofpic" src="' . $fulldest . '" alt="profpic">
                        <p class="chatmessage">' . $chatrow['message'] . '</p>
                     </div>
                ';
        }
    }
}

if (isset($_POST['seenmes'])){
    $user = $_POST['seenmes'];
    $sql = "UPDATE chat SET status='read' WHERE reciever='".$_SESSION['username']."'";
    $sqlr = mysqli_query($conn, $sql);
}