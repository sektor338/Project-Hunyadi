<?php
include 'dbh.inc.php';
if (isset($_SESSION['username'])) {
    $sql = "SELECT * FROM users WHERE name = '".$_SESSION['username']."'";
    $userrs1 = mysqli_query($conn, $sql);
    $user1 = mysqli_fetch_array($userrs1);
    if($user1['profile_pic'] == "trans.png"){
        $dest = "pictures/ranks and insignia/Sleeve(parka)";
    }
    else{
        $dest = "pictures/profile pictures";
    }
    $fulldest = $dest."/".$user1['profile_pic'];
    echo "                  <div class='maindiv' id='userdiv'>

                                <div class='usera'>
                                      <img class='img' id='profile_picture' src='".$fulldest."' alt='Profile picture' id='userpic'>
                                </div>
                                <div class='usera'>
                                      <a id='username' href='profile.php'>";
    echo $_SESSION['username'];
    echo "</a>
    <a id='userpoints'>";
    $sql = "SELECT points FROM users WHERE name = '".$_SESSION['username']."'";
    $sqlrs = mysqli_query($conn, $sql);
    $sqlresult = mysqli_fetch_array($sqlrs)[0];
    echo $sqlresult;
    echo "</a>
                                </div>
                                <div id='sleeves_div'>
                                      <img class='insignia img' id='collar_badges' src='".$_SESSION['collar_badges']."' alt='Collar badges'>
                                      <img class='insignia img' id='sleeves' src='".$_SESSION['shoulder_straps']."' alt='Shoulder straps and sleeves'>
                                      <img class='insignia img' id='parka' src='".$_SESSION['parka']."' alt='Sleeve(parka)'>
                                </div>";
    if ($_SESSION['patreon'] !== 'pictures/ranks and insignia/Sleeve(parka)/trans.png') {
        echo "<div id='rewards'>
                                            <img id='reward' src='".$_SESSION['patreon']."' alt='Patreon'>
                                      </div>";
    }

    echo "<div id='userdescdiv'>  <a id='description'>";
    echo $user1['user_desc'];
    echo "</a>
                    </div>      </div>";
} else {
    echo '<div style="text-align: center" class="maindiv" id="userdiv">
                    <a href="https://www.patreon.com/pannoniait" target="_blank"><img alt="patreon" id="patreon" src="pictures/icons/Patreon-Support-Button.png"></a>
             <div><a class="consider" href="https://www.patreon.com/pannoniait" target="_blank">If you like this website please consider supporting us on Patreon.</a>
</div>
              <div><br>
              <a id="supportersa" href="supporters.php">People who support us</a>
</div>
<div ><a class="consider" href="https://www.paypal.me/mmartinzsolt" target="_blank">One-time support on PayPal</a>
</div>
              </div>
              ';
}
