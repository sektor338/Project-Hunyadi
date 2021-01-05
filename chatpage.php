<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once 'dbh.inc.php';
    include 'header.php';
    ?>
    <link rel="stylesheet" href="chatpage.css">
    <script type="text/javascript" src="chatpage.js"></script>
</head>
<body onload="scroll1()">
<?php include 'navbar.php'; ?>
<main>
    <div class="grid" id="leftdiv">
        <div id="friendlistdiv">
            <?php
            include "friendlist.php";
            ?>
        </div>
    </div>
    <div class="grid" id="centerdiv">
            <div id="centerup">
                <img id="userpic" src="pictures/profile%20pictures/5e2a2fab520c37.73745880.jpg" alt="profpic">
                <a id="usernname" href="">Toothfucker47</a>
            </div>
            <div id="centermid">
                <?php
                if (isset($_GET['user'])){
                    if ($_GET['user'] != ''){
                        include "chatpagemess.php";
                    }
                }
                ?>
            </div>
<?php
if (isset($_GET['user'])){
    echo '<div id="centerbottom">
            <img class="sendchat" id="sendchat1" src="pictures/icons/sendchat.png" alt="send" onclick="sendmessage1()">
            <input class="chatinput" name="'.$_GET['user'].'" id="chatinput1" type="text" onkeydown="process1(event, this)">
        </div>';
}
?>

    </div>
    <div class="grid" id="rightdiv">
        <div id="userinfo">

        </div>
        <div id="">

        </div>
        <div></div>
    </div>
</main>
</body>
</html>
