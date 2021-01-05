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
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $size = 10;
            $offset = ($page - 1) * $size;

            $total_pages_sql = "SELECT COUNT(*) FROM users";
            $result = mysqli_query($conn, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $size);

            function paginate($total_rows, $page, $size, $total_pages)
            {
                $markup = "";
                $page1 = 1;
                $page2 = $page + 1;
                $page3 = $page - 1;
                if ($page == 1) {
                    $firstdisable = "disabled";
                } else {
                    $firstdisable = "enabled";
                }
                if ($page == 2) {
                    $seconddisable = "disabled";
                } else {
                    $seconddisable = "enabled";
                }
                if ($page == 1 || $page == 2 || $page == 3) {
                    $thirddisable = "disabled";
                } else {
                    $thirddisable = "enabled";
                }
                if ($page >= $total_pages - 2) {
                    $lastdisable = "disabled";
                } else {
                    $lastdisable = "enabled";
                }
                if ($page >= $total_pages - 1) {
                    $last1disable = "disabled";
                } else {
                    $last1disable = "enabled";
                }
                if ($page == $total_pages || $page == 1) {
                    $last2disable = "disabled";
                } else {
                    $last2disable = "enabled";
                }

                $markup .= "<li class='page-item enabled'>
                                         <a class='page-link' href=\"?page=$page1\">$page1</a>
                                         </li>";
                $markup .= "<li class='page-item " . $thirddisable . "'>
                                         <a class='page-link " . $thirddisable . "'>...</a>
                                         </li>";
                $markup .= "<li class='page-item " . $firstdisable . "'>
                                         <a class='page-link " . $firstdisable . " " . $seconddisable . "' href=\"?page=$page3\">$page3</a>
                                         </li>";
                $markup .= "<li class='page-item " . $last2disable . "'>
                                         <a class='page-link " . $last2disable . "' href=\"?page=$page\">$page</a>
                                         </li>";
                $markup .= "<li class='page-item " . $last1disable . "'>
                                         <a class='page-link " . $last1disable . "' href=\"?page=$page2\">$page2</a>
                                         </li>";
                $markup .= "<li class='page-item " . $lastdisable . "'>
                                         <a class='page-link " . $lastdisable . "'>...</a>
                                         </li>";
                $markup .= "<li class='page-item enabled'>
                                         <a class='page-link' href=\"?page=$total_pages\">$total_pages</a>
                                         </li>";
                return $markup;

            }

            $sql = "SELECT * FROM users ORDER BY name asc LIMIT $offset, $size";
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
                                echo "<img id='friendaction' title='Remove from friends' class='friendbtns ".$row['name']."' src='pictures/icons/deletef.png' name='" . $friendsql['friendrid'] . "' onclick='afudeny()' alt='deletefriend'>";
                                echo "<img id='friendaction' title='Block' class='friendbtns ".$row['name']."' src='pictures/icons/block.png' name='" . $friendsql['friendrid'] . "' onclick='afublock()' alt='block'>";
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
        <nav id="pagination">
            <ul id="pagiul">
                <li class="<?php if($page <= 1){ echo 'disabled'; }else {
                    echo "pagili";
                } ?>"><a class="pagilia" href="?page=1"><img alt="first" src='pictures/icons/first.png' style="height: 30px; width: 30px;"></a></li>
                <li class="<?php if($page <= 1){ echo 'disabled'; }else {
                    echo "pagili";
                } ?>">
                    <a class="pagilia" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><img alt="leftarrow" src='pictures/icons/leftarrow.png' style="height: 30px; width: 30px;"></a>
                </li>
                <?php echo paginate($total_rows,$page,$size,$total_pages)?>
                <li class="<?php if($page >= $total_pages){ echo 'disabled'; }else {
                    echo "pagili";
                } ?>">
                    <a class="pagilia" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>"><img alt="rightarrow" src='pictures/icons/rightarrow.png' style="height: 30px; width: 30px;"></a>
                </li>
                <li class="<?php if($page >= $total_pages){ echo 'disabled'; }else {
                    echo "pagili";
                } ?>"><a class="pagilia" href="?page=<?php echo $total_pages; ?>"><img alt="last" src='pictures/icons/last.png' style="height: 30px; width: 30px;"></a></li>
            </ul>
        </nav>
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>