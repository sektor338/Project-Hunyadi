<?php
include "dbh.inc.php";
$time = date("Y-m-d");
$sql = "SELECT reg_date FROM users WHERE name='sektor338'";
$sqlr = mysqli_query($conn, $sql);
$sqlrs = mysqli_fetch_array($sqlr);
$diff = strtotime($time) - strtotime($sqlrs[0]);
$years = floor($diff / (365*60*60*24));
echo $years;

if ($years > 1){
    echo $diff;
    $sql = "UPDATE users SET reward='pictures/rewards/ss1year.png' WHERE name='sektor338'";
    $sqlr = mysqli_query($conn, $sql);
}
