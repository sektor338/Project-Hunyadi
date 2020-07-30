<link rel="stylesheet" href="notificationtab.css">
<script type="text/javascript" src="friend.js"></script>
<script type="text/javascript" src="notificationtab.js"></script>
<div id="notifitab" onmouseleave="closenotifitab()" class="<?php echo $_SESSION['username']?>">
    <div id="filtersdiv">
        <div id="ffilter" class="notififiltersdiv" onclick="filterf()">
            <a class="notififilters">Friend requests</a>
        </div>
        <div id="cfilter" class="notififiltersdiv" onclick="filterc()">
            <a class="notififilters">Comments</a>
        </div>
        <br>
        <div id="vfilter" class="notififiltersdiv" onclick="filterv()">
            <a class="notififilters">Votes</a>
        </div>
        <div id="rfilter" class="notififiltersdiv" onclick="filterr()">
            <a class="notififilters">Reports</a>
        </div>
    </div>
    <?php
$sql = "SELECT * FROM notifications WHERE reciever='".$_SESSION['username']."' ORDER BY notifidate DESC";
$res_data = mysqli_query($conn, $sql)
or die("Error: " . mysqli_error($conn));
while ($row = mysqli_fetch_array($res_data)) {
    $sql = "SELECT * FROM users WHERE name = '" . $row["sender"] . "'";
    $userrs = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($userrs);
    if ($user['profile_pic'] == "trans.png") {
        $dest = "pictures/ranks and insignia/Sleeve(parka)";
    } else {
        $dest = "pictures/profile pictures";
    }
    $fulldest = $dest . "/" . $user['profile_pic'];
    if ($row['notifitype'] == "plike"){
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a href="post.php?postid='.$row["contentid"].'" class="notifitext">liked your post.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "pdislike"){
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'>'.$row["sender"].' </a><a href="post.php?postid='.$row["contentid"].'" class="notifitext">disliked your post.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "cdislike"){
        $sqlc = "SELECT * FROM comments WHERE comment_id='".$row['contentid']."'";
        $resc = mysqli_query($conn, $sqlc);
        $rssql = mysqli_fetch_array($resc);
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a href="post.php?postid='.$row["contentid"].'" class="notifitext" href="post.php?postid='.$rssql["post_id"].'">disliked your comment.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "clike"){
        $sqlc = "SELECT * FROM comments WHERE comment_id='".$row['contentid']."'";
        $resc = mysqli_query($conn, $sqlc);
        $rssql = mysqli_fetch_array($resc);
        echo '
        <div class="notifications notifivotes">
         <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a class="notifitext" href="post.php?postid='.$rssql["post_id"].'">liked your comment.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "comment"){
        $sqlc = "SELECT * FROM comments WHERE comment_id='".$row['contentid']."'";
        $resc = mysqli_query($conn, $sqlc);
        $rssql = mysqli_fetch_array($resc);
        echo '
        <div class="notifications notificomments">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a href="post.php?postid='.$rssql["post_id"].'" class="notifitext">commented your post.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "commentreport"){
        echo '
        <div class="notifications notifireport">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a class="notifitext">reported your commented.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "report"){
        echo '
        <div class="notifications notifireport">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><a href="post.php?postid='.$row["contentid"].'" class="notifitext">reported your post.</a>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "friendreq"){
        $sql = "SELECT status FROM friend_request WHERE friendrid='".$row['contentid']."'";
        $sqlr1 = mysqli_query($conn, $sql);
        $sqlrs1 = mysqli_fetch_row($sqlr1);
        if ($sqlrs1[0] != "accepted"){
            echo '
        <div class="notifications notififriend">
        <hr>
        <div class="leftnotifidiv">
            <img class="notifipic" src="'.$fulldest.'" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">'.$row['sender'].' </a><a class="notifitext">wants to be your friend.</a>
            <div class="friendnotifi">
                <button class="friendnotifibtn acceptbtn" name="'.$row['contentid'].'" onclick="faccept()">Accept</button>
                <button class="friendnotifibtn denybtn" name="'.$row['contentid'].'" onclick="fdeny()">Deny</button>
                <button class="friendnotifibtn blockbtn" name="'.$row['contentid'].'" onclick="fblock()">Block</button>
            </div>
        </div>
    </div>';
        }
    }
    }
    ?>
</div>