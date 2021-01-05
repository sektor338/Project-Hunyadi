<?php
include "dbh.inc.php";
session_start();

if (isset($_POST['user'])){
    if (!isset($_SESSION['usertab1'])){
        $_SESSION['usertab1'] = $_POST['user'];
    $sql = "SELECT COUNT(*) FROM friends";
    $sqlr = mysqli_query($conn, $sql);
    echo'
<div id="friendlist" onclick="chatd()" style="display: none">
    <div class="chatadiv">
            <a id="chata">Friendlist</a>
    </div>
</div>

<div id="chat" style="display: block">
        <div id="friendlistup" onclick="frlistclose()">
            <a id="chata">Friendlist</a>
        </div>
        <div class="friendlistmid">';
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
            echo '
        </div>
        <div id="friendlistbottom">
            <input id="friendlistsearch" type="text" onkeyup="friendsearch()">
        </div>
</div>';
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
<div id="chattab1" style="display: none">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd1()">
        <a id="chata">'.$_SESSION['usertab1'].'</a>
    </div>
    <img class="closechat" id="closechat1" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab1()">
</div>  
<div id="tab1" class="chattab tab1" style="display: block">
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
        <input class="chatinput" id="chatinput1" type="text" onkeypress="process1(event, this)">
    </div>
</div>
';
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
<div id="chattab2" style="display: none">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd2()">
        <a id="chata">'.$_SESSION['usertab2'].'</a>
    </div>
    <img class="closechat" id="closechat2" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab2()">
</div>


<div id="tab2" class="chattab tab2" style="display: block">
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
        OR sender='".$_SESSION['usertab1']."' AND reciever='".$_SESSION['username']."'";
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
        <input class="chatinput" id="chatinput2" type="text" onkeypress="process2(event, this)">
    </div>
</div>';}
    }
    else{
        if ($_POST['user'] != $_SESSION['usertab1']){

            $_SESSION['usertab2'] = $_SESSION['usertab1'];
            $_SESSION['usertab1'] = $_POST['user'];
            $sql = "SELECT COUNT(*) FROM friends";
            $sqlr = mysqli_query($conn, $sql);
            echo'
<div id="friendlist" onclick="chatd()" style="display: none">
    <div class="chatadiv">
            <a id="chata">1488 online</a>
    </div>
</div>

<div id="chat" style="display: block">
        <div id="friendlistup" onclick="frlistclose()">
            <a id="chata">1488 online</a>
        </div>
        <div class="friendlistmid">';
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
            echo '
        </div>
        <div id="friendlistbottom">
            <input id="friendlistsearch" type="text" onkeyup="friendsearch()">
        </div>
</div>';
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
<div id="chattab1" style="display: none">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd1()">
        <a id="chata">'.$_SESSION['usertab1'].'</a>
    </div>
    <img class="closechat" id="closechat1" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab1()">
</div>
<div id="tab1" class="chattab tab1" style="display: block">
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
        <input class="chatinput" id="chatinput1" type="text" onkeypress="process1(event, this)">
    </div>
</div>
';
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
<div id="chattab2" style="display: none">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd2()">
        <a id="chata">'.$_SESSION['usertab2'].'</a>
    </div>
    <img class="closechat" id="closechat2" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab2()">
</div>


<div id="tab2" class="chattab tab2" style="display: block">
    <div class="chattabup" id="chattabup2">
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
        OR sender='".$_SESSION['usertab1']."' AND reciever='".$_SESSION['username']."'";
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
        <input class="chatinput" id="chatinput2" type="text" onkeypress="process2(event, this)">
    </div>
';}
        }
        else{
            unset($_SESSION['usertab2']);
            $_SESSION['usertab1'] = $_POST['user'];
            $sql = "SELECT COUNT(*) FROM friends";
            $sqlr = mysqli_query($conn, $sql);
            echo'
<div id="friendlist" onclick="chatd()" style="display: none">
    <div class="chatadiv">
            <a id="chata">1488 online</a>
    </div>
</div>

<div id="chat" style="display: block">
        <div id="friendlistup" onclick="frlistclose()">
            <a id="chata">1488 online</a>
        </div>
        <div class="friendlistmid">';
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
            echo '
        </div>
        <div id="friendlistbottom">
            <input id="friendlistsearch" type="text" onkeyup="friendsearch()">
        </div>
</div>';
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
<div id="chattab1" style="display: none">
    <img class="chatstatus" src="'.$userstatus.'" alt="online">
    <div class="chatadiv" onclick="chattabd1()">
        <a id="chata">'.$_SESSION['usertab1'].'</a>
    </div>
    <img class="closechat" id="closechat1" src="pictures/icons/deletef.png" alt="closechat" onclick="closechattab1()">
</div>
<div id="tab1" class="chattab tab1" style="display: block">
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
        <input class="chatinput" id="chatinput1" type="text" onkeypress="process1(event, this)">
    </div>
</div>
';
        }
    }
}

if (isset($_POST['action'])){
    switch ($_POST['action']) {
    case 'closechattab1':
        unset($_SESSION['usertab1']);
        break;
    case 'closechattab2':
        unset($_SESSION['usertab2']);
        break;
}
}

if (isset($_POST['sendmessage'])){
    switch ($_POST['sendmessage']) {
        case "tab1":
            $reciever = mysqli_real_escape_string($conn, $_SESSION['usertab1']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO chat (sender, reciever, date, type, message, status)
            VALUES ('".$_SESSION['username']."', '".$reciever."', '".$date."', 'user', '".$message."', 'unseen')";
            mysqli_query($conn, $sql);
            break;
        case "tab2":
            $reciever = mysqli_real_escape_string($conn, $_SESSION['usertab2']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO chat (sender, reciever, date, type, message, status)
            VALUES ('".$_SESSION['username']."', '".$reciever."', '".$date."', 'user', '".$message."', 'unseen')";
            mysqli_query($conn, $sql);
            break;
    }
}
