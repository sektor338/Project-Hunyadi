<?php
$sqluser = "SELECT * FROM users WHERE name = '".$_GET['user']."'";
$sqluserrs = mysqli_query($conn, $sqluser);
$userchat = mysqli_fetch_array($sqluserrs);
if ($userchat['profile_pic'] == "trans.png") {
    $dest = "pictures/ranks and insignia/Sleeve(parka)";
} else {
    $dest = "pictures/profile pictures";
}
$fulldest = $dest . "/" . $userchat['profile_pic'];
$sql = "SELECT * FROM chat WHERE sender='".$_SESSION['username']."' AND reciever='".$_GET['user']."'
        OR sender='".$_GET['user']."' AND reciever='".$_SESSION['username']."'";
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