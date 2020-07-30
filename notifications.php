<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    include_once 'dbh.inc.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="The best place on the internet">
    <meta name="keywords" content="national socialism, Hitler, funny">
    <meta name="author" content="Martin Mészáros">
    <link href="https://fonts.googleapis.com/css?family=Germania+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="notification.css">
    <script type="text/javascript" src="friend.js"></script>
    <script type="text/javascript" src="notification.js"></script>
    <script src="dropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Eagle's Nest</title>
</head>
<body>
<nav id="headernav">
    <ul id="headerul"
        <?php
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            echo 'onmouseover="dropdown()" onmouseleave="navup()"';
        }
        ?>
    >
        <li class="dropdownclass" id="dropdown"><img id="dropdownimg" src="pictures/icons/dropdown1.png"
                                                     alt="dropdown1"></li>
        <!--<li class="navbarli"><a href="news.php" class="navbara" id="news">News</a></li>-->
        <li class="navbarli"><a href="index.php" class="navbara" id="front">Front</a></li>
        <li class="navbarli"><a href="fresh.php" class="navbara" id="fresh">Fresh</a></li>

        <?php
        if (isset($_SESSION['username'])) {
            $sql = "SELECT COUNT(*) FROM notifications WHERE reciever='".$_SESSION['username']."' AND notifistatus='unread'";
            $res_data = mysqli_query($conn, $sql)
            or die("Error: " . mysqli_error($conn));
            $notifinum = mysqli_fetch_array($res_data);

            echo '
<li class="navbarli"><a href="allusers.php" class="navbara" id="fresh">Users</a></li>
<li class="navbarli"><a href="upload.php" value="upload" class="navbara" id="upload">Upload</a></li>
                  
                  <li class="navbarli settingsnav"><a class="navbara" href="/settings.php"><img id="settingsimg" src="pictures/icons/settings.png" alt="settings"></a></li>
                  <li class="navbarli notifinav"
                   
                   ';

            $useragent = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
                echo 'onclick="notifipage()"';
            }
            else{
                echo 'onclick="notifidisp()">';
            }


            echo '
                  <a class="notification" >
                        <img id="bellicon" src="pictures/icons/notification.png" alt="notifi">';
            if ($notifinum[0] != 0){
                echo "<span id='badge'>$notifinum[0]</span>";
            }
            echo '
                  </a>
                  </li>
                  <li style="padding:0; vertical-align:sub;" class="navbarli"><form action="logout.inc.php" method="post">
                        <button style="cursor: pointer; vertical-align:sub;" type="submit" id="logout" name="logout"><img style="width: 30px; height: 30px; padding:0; margin:0;" src="pictures/icons/logout.png" alt="logout"></button>
                  </form></li>';

        } else {
            echo '

                  <li class="navbarli"><a href="login.php" value="login" class="navbara" id="login">Login</a></li>
                  <li class="navbarli"><a href="register.php" value="register" class="navbara" id="register">Register</a></li>
                  ';
        }
        ?>
    </ul>
</nav>
<main>
    <center>
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
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
