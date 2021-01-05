<link rel="stylesheet" href="chat.css">
<script type="text/javascript" src="chat.js"></script>

<div id="mainchat">
<?php/*
$sql1 = "SELECT user_one FROM friends WHERE user_two='".$_SESSION['username']."'";
$sqlar1 = mysqli_query($conn, $sql1);
$sqlaonline1 = mysqli_fetch_array($sqlar1);

$sql2 = "SELECT user_two FROM friends WHERE user_one='".$_SESSION['username']."'";
$sqlar2 = mysqli_query($conn, $sql2);
$sqlaonline2 = mysqli_fetch_array($sqlar2);


    $sqla = "SELECT COUNT(*) FROM users WHERE name=!'".$_SESSION['username']."' AND userstatus='1' AND name='".$sqlaonline1."'";
    $sqlar = mysqli_query($conn, $sqla);
    $sqlaonline = mysqli_fetch_array($sqlar);*/
?>
<div id="friendlist" onclick="chatd()" style="display: none">
    <div class="chatadiv">
            <a id="chata">
                <?php
                    echo "Friendlist";
                ?>
            </a>
    </div>
</div>

<div id="chat" style="display: block">
        <div id="friendlistup" onclick="frlistclose()">
            <a id="chata">
                <?php
                    echo "Friendlist";
                ?>
            </a>
        </div>
        <div class="friendlistmid">
            <?php
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
            ?>
        </div>
        <div id="friendlistbottom">
            <input id="friendlistsearch" type="text" onkeyup="friendsearch()">
        </div>
</div>
<?php
if (isset($_SESSION['usertab1'])){
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
echo '
<div id="chattab1" style="display: block">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd1()">
        <a id="chata">'.$_SESSION['usertab1'].'</a>
    </div>
    <img class="closechat" id="closechat1" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab1()">
</div>
<div id="tab1" class="chattab tab1" style="display: none">
    <div class="chattabup" id="chattabup1">
        <div>
            <img id="chatprofpic1" class="chatprofpic" src="'.$fulldest .'" alt="profpic">
        </div>
        <a class="chatname" id="chatname1" href="users.php?user='.$_SESSION['usertab1'].'">'.$_SESSION['usertab1'].'</a>
        <img class="userchatstatus" id="userchatstatus1" src="'.$userstatus.'" alt="online">
        <img class="closechatup" id="closechatup1" src="pictures/icons/deletef.png" alt="closechat" onclick="closechat1()">
        <img class="minimize" id="minimize1" src="pictures/icons/minimize.png" onclick="minimize1()" alt="minimize">
    </div>
    <div class="messages" id="messages1">
    ';
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
    echo '
    </div>
    <div id="chattext1" class="chattext">
        <img class="sendchat" id="sendchat1" src="pictures/icons/sendchat.png" alt="send" onclick="sendmessage1()">
        <input class="chatinput" id="chatinput1" type="text" onkeydown="process1(event, this)">
    </div>
</div>
';}
if (isset($_SESSION['usertab2'])){
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
    echo '
<div id="chattab2" style="display: block" onclick="chattabd2()">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" >
        <a id="chata">'.$_SESSION['usertab2'].'</a>
    </div>
    <img class="closechat" id="closechat2" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab2()">
</div>


<div id="tab2" class="chattab tab2" style="display: none">
    <div class="chattabup" id="chattabup1">
        <div>
            <img id="chatprofpic2" class="chatprofpic" src="'.$fulldest .'" alt="profpic">
        </div>
        <a class="chatname" id="chatname2" href="users.php?user='.$_SESSION['usertab2'].'">'.$_SESSION['usertab2'].'</a>
        <img class="userchatstatus" id="userchatstatus2" src="'.$userstatus.'" alt="online">
        <img class="closechatup" id="closechatup2" src="pictures/icons/deletef.png" alt="closechat" onclick="closechat2()">
        <img class="minimize" id="minimize2" src="pictures/icons/minimize.png" onclick="minimize2()" alt="minimize">
    </div>
    <div class="messages" id="messages2">
    ';
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
    echo '
    </div>
    <div id="chattext2" class="chattext">
        <img class="sendchat" id="sendchat2" src="pictures/icons/sendchat.png" alt="send" onclick="sendmessage2()">
        <input class="chatinput" id="chatinput2" type="text" onkeydown="process2(event, this)">
    </div>
</div>';}
?>
</div>
