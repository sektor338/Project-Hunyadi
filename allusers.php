<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="allusers.css">
    <script type="text/javascript" src="friend.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
<main>
    <center>
        <div id="title">
            <a id="titlea">Users</a>
        </div>
        <div id="maindiv">
            <?php
            include_once 'dbh.inc.php';
            $sql = "SELECT * FROM users ORDER BY name asc";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<hr>
                                    <div class='patronsdiv'>
                                       <div class='name partdiv'><a class='namea' href='users.php?user=".$row['name']."'>".$row['name']."</a></div>
                                       <div class='tdcollar partdiv'><img class='collar_badges' src='".$row['collar_badges']."' alt='collar_badges'></div>
                                       <div class='tdsleeves partdiv'><img class='shoulder_straps' src='".$row['shoulder_straps']."' alt='shoulder_straps'></div>
                                       <div class='tdparka partdiv'><img class='parka' src='".$row['parka']."' alt='parka'></div>
                                       <div class='tdbadge partdiv'><img class='reward' src='".$row['patreon']."' alt='badge'></div>
                                       <div class='tdpoints partdiv'><a class='pointa'>".$row['points']."</a></div>
                                       <div class='partdiv frienddiv'>";
                if (isset($_SESSION['username'])){
                    $sqlfr = "SELECT * FROM friend_request WHERE sender = '" . $_SESSION['username'] . "' AND reciever = '" . $row['name'] . "'  OR reciever = '" . $_SESSION['username'] . "' AND sender = '" . $row['name'] . "'";
                    $sqlrsfr = mysqli_query($conn, $sqlfr);
                    $friendsql = mysqli_fetch_array($sqlrsfr);
                    if ($_SESSION['username'] != $row['name']) {
                        if ($friendsql[0] == 0 && $friendsql['status'] != "blocked") {
                            echo "<img id='friendaction' class='" .$row['name']. "' onclick='friendrequ()' name='".$row['name']."' src='pictures/icons/addf.png' alt='addfriend'>";
                        } else {
                            if ($friendsql['status'] == "accepted") {
                                echo "<img id='friendaction' class='friendbtns ".$row['name']."' src='pictures/icons/deletef.png' name='" . $friendsql['friendrid'] . "' onclick='afudeny()' alt='deletefriend'>";
                                echo "<img id='friendaction' class='friendbtns ".$row['name']."' src='pictures/icons/block.png' name='" . $friendsql['friendrid'] . "' onclick='afublock()' alt='block'>";
                            }
                        }
                    }
                }

                                   echo "</div>
                                   </div>
                                   <hr><br>
                                   ";
            }
            ?>
        </div>
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>