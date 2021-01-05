<?php
include "dbh.inc.php";
session_start();
if(isset($_POST['refreshtab'])){
    switch ($_POST['refreshtab']){
        case "tab1":
            $sqluser = "SELECT * FROM users WHERE name = '".$_SESSION['usertab1']."'";
            $sqluserrs = mysqli_query($conn, $sqluser);
            $userchat = mysqli_fetch_array($sqluserrs);
            if ($userchat['profile_pic'] == "trans.png") {
                $dest = "pictures/ranks and insignia/Sleeve(parka)";
            } else {
                $dest = "pictures/profile pictures";
            }
            $fulldest = $dest . "/" . $userchat['profile_pic'];

            if($userchat['userstatus'] == "0"){
                $userstatus = "pictures/icons/offline.png";
            }
            else{
                $userstatus = "pictures/icons/online.png";
            }
            $sql = "SELECT * FROM chat WHERE sender='".$_SESSION['username']."' AND reciever='".$_SESSION['usertab1']."'
        OR sender='".$_SESSION['usertab1']."' AND reciever='".$_SESSION['username']."'";
            $sqlr = mysqli_query($conn, $sql)
            or die("Error: ".mysqli_error($conn));
            while ($chatrow = mysqli_fetch_array($sqlr)) {
                if ($chatrow['sender'] == $_SESSION['username']){
                    echo '
                    <div id="chatright1" class="chatrightdiv">
                        <p class="chatmessage">'.$chatrow['message'].'</p>
                    </div>
                ';
                }
                else{
                    echo '
                     <div id="chatleft1" class="chatleftdiv">
                        <img id="messageprofpic1" class="messageprofpic" src="'.$fulldest .'" alt="profpic">
                        <p class="chatmessage">'.$chatrow['message'].'</p>
                     </div>
                ';
                }
            }
            break;
        case "tab2":
            $sqluser = "SELECT * FROM users WHERE name = '".$_SESSION['usertab2']."'";
            $sqluserrs = mysqli_query($conn, $sqluser);
            $userchat = mysqli_fetch_array($sqluserrs);
            if ($userchat['profile_pic'] == "trans.png") {
                $dest = "pictures/ranks and insignia/Sleeve(parka)";
            } else {
                $dest = "pictures/profile pictures";
            }
            $fulldest = $dest . "/" . $userchat['profile_pic'];

            if($userchat['userstatus'] == "0"){
                $userstatus = "pictures/icons/offline.png";
            }
            else{
                $userstatus = "pictures/icons/online.png";
            }
            $sql = "SELECT * FROM chat WHERE sender='".$_SESSION['username']."' AND reciever='".$_SESSION['usertab2']."'
        OR sender='".$_SESSION['usertab2']."' AND reciever='".$_SESSION['username']."'";
            $sqlr = mysqli_query($conn, $sql)
            or die("Error: ".mysqli_error($conn));
            while ($chatrow = mysqli_fetch_array($sqlr)) {
                if ($chatrow['sender'] == $_SESSION['username']){
                    echo '
                    <div id="chatright2" class="chatrightdiv">
                        <p class="chatmessage">'.$chatrow['message'].'</p>
                    </div>
                ';
                }
                else{
                    echo '
                     <div id="chatleft2" class="chatleftdiv">
                        <img id="messageprofpic2" class="messageprofpic" src="'.$fulldest .'" alt="profpic">
                        <p class="chatmessage">'.$chatrow['message'].'</p>
                     </div>
                ';
                }
            }
            break;
    }
}

