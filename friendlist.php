<div id="friendlistup">
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
                $sql = "SELECT COUNT(*) FROM chat WHERE reciever='".$_SESSION['username']."' AND status='unseen' AND sender='".$user['name']."' ";
                $res_data = mysqli_query($conn, $sql)
                or die("Error: " . mysqli_error($conn));
                $notifinum = mysqli_fetch_array($res_data);
                echo '<div class="frienddiv" id="'.$user['name'].'" onclick="user()">
                <img id="'.$user['name'].'" class="friendpic" src="'.$fulldest .'" alt="profpic">
                <a id="'.$user['name'].'" href="chatpage.php?user='.$user['name'].'" class="friendname">';
                if ($row['user_one'] == $_SESSION['username']){
                    echo $row['user_two'];
                }
                else{
                    echo $row['user_one'];
                }
                echo'</a>
                <img class="friendstatus" src="'.$userstatus.'" alt="online">';
                if ($notifinum[0] != 0){
                    echo "<span id='unreadm'>$notifinum[0]</span>";
                }
                echo '
                </div>';
            }
            ?>
        </div>
        <div id="friendlistbottom">
            <input id="friendlistsearch" type="text" onkeyup="friendsearch()">
        </div>