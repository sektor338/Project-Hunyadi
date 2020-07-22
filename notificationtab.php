<div id="notifitab">
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
    if ($row['notifitype'] == "plike"){
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">liked your post.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "pdislike"){
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'>'.$row["sender"].' </a><p class="notifitext">disliked your post.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "cdislike"){
        echo '
        <div class="notifications notifivotes">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">disliked your comment.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "clike"){
        echo '
        <div class="notifications notifivotes">
         <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">liked your comment.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "comment"){
        echo '
        <div class="notifications notificomments">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">commented your post.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "commentreport"){
        echo '
        <div class="notifications notifireport">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">reported your commented.</p>
        </div>
    </div>';
    }
    elseif ($row['notifitype'] == "report"){
        echo '
        <div class="notifications notifireport">
        <hr>
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user='.$row["sender"].'">'.$row["sender"].' </a><p class="notifitext">reported your post.</p>
        </div>
    </div>';
    }
    }
    ?>
   <!-- <div class="notifications notififriend">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">wants to be your friend.</p>
            <div class="friendnotifi">
                <button class="friendnotifibtn acceptbtn">Accept</button>
                <button class="friendnotifibtn denybtn">Deny</button>
                <button class="friendnotifibtn blockbtn">Block</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
                <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
                <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has liked your post.</p>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has disliked your post.</p>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has liked your comment.</p>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has disliked your comment.</p>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has commented your post.</p>
        </div>
    </div>
    <hr>
    <div class="notifications">
        <div class="leftnotifidiv">
            <img class="notifipic" src="pictures/profile%20pictures/sektor338.png" alt="profpic">
        </div>
        <div class="rightnotifidiv">
            <a class="notifiname" href="users.php?user=sektor338">sektor338 </a><p class="notifitext">has reported your post.</p>
        </div>
    </div>
    <hr>-->
</div>