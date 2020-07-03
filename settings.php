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
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="main.css">
    <script src="dropdown.js"></script>
    <script src="settings.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Eagle's Nest</title>
</head>
<body>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<?php include 'navbar.php'; ?>
<main>
    <div id="leftnavdiv">
    <ul id="leftnavul"
        <?php
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            echo 'onmouseover="left()" onmouseout="right()"';
        }
        ?>
    >
        <li id="leftdropdown"><img id="leftdropdownimg" src="pictures/icons/dropdown2.png" alt="dropdown1"></li>
        <li class="leftnavli" onclick="profpic()"><img class="leftnavimg" id="profpic" src="pictures/icons/profpic.png" alt="profile picture">
            <a class="leftnava">Profile picture</a></li>
        <li class="leftnavli" onclick="userdesc()"><img class="leftnavimg" id="userdesc" src="pictures/icons/userdesc.png" alt="profile description">
            <a class="leftnava">User description</a></li>
        <li class="leftnavli" onclick="email()"><img class="leftnavimg" id="email" src="pictures/icons/email.png" alt="email">
            <a class="leftnava">Email</a></li>
        <li class="leftnavli" onclick="passwd()"><img class="leftnavimg" id="passwd" src="pictures/icons/passwd.png" alt="password">
            <a class="leftnava">Password</a></li>
        <?php
            if ($_SESSION['patreon'] !== "pictures/ranks and insignia/Sleeve(parka)/trans.png"){
                echo '<li class="leftnavli" onclick="patreon()"><img id="patron" class="leftnavimg" src="pictures/icons/patron.png" alt="patreon">
 <a class="leftnava">Patron settings</a></li>';
            }
            else{
                echo '<li class="leftnavli"><img id="patron" class="leftnavimg" src="pictures/icons/onlypatroons.png" alt="patreon">
 <a class="leftnava">Only for Patrons</a></li>';
            }
        ?>

    </ul>
</div>
    <center>
    <div class="maindiv1" id="realprofpic">
        <div>
            <form action="settings.ini.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php echo"
                    <img id='profile_picture' src='pictures/profile pictures/".$_SESSION['profpic']."' alt='Profile picture' id='userpic'>";
                    ?>
                </div>
                <label onclick="uplabel()" id="settingsfilelabel" for="picupload">Click here to upload a profile picture</label><br>
                <input id="picupload" type="file" name="profile_picture" required>
                <div id="subdiv">
                    <input class="submit" type="submit" name="upload" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <div class="maindiv1" id="realuserdesc">
        <center>
        <form class="settingform" action="settings.ini.php" method="post" >
        <label>Change your description about yourself</label><br>
        <input id="userdescreption" class="input" type="text" required maxlength="100" name="userdesc">
        <div id="subdiv">
            <input class="submit" type="submit" name="descup" value="Submit">
        </div>
        </form>
            </center>
    </div>
    <div class="maindiv1" id="realemail">
        <center>
        <form class="settingform" action="settings.ini.php" method="post">
        <label>Change your email</label><br>
        <input id="email" class="input" type="text" required maxlength="50" name="email">
        <div id="subdiv">
            <input class="submit" type="submit" name="emailup" value="Submit">
        </div>
        </form>
        </center>
    </div>
    <div class="maindiv1" id="realpasswd">
        <center>
        <form class="settingform" action="settings.ini.php" method="post">
        <label>Change your password</label><br>
        <input id="passwd1" class="input" type="password" required maxlength="50" name="passwd1"><br>
        <label>Confirm password</label><br>
        <input id="passwd2" class="input" type="password" required maxlength="50" name="passwd2">
        <div id="subdiv">
            <input class="submit" type="submit" name="passwdup" value="Submit">
        </div>
        </form>
            </center>
    </div>
    <div class="maindiv1" id="realpatron">
        <center>
        <form class="settingform" action="settings.ini.php" method="post">
        <label>Thanks for the support</label><br>
        <div id="subdiv">
            <input class="submit" type="submit" name="patreonup">
        </div>
        </form>
    </center>
    </div>
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
