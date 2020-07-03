<?php
include 'dbh.inc.php';
session_start();
$poster = $_POST['poster'];
$point = mysqli_query($conn,"SELECT points FROM users WHERE name = '".$poster."'");

if ($point >= 100 && $point < 500){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Oberschütze.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Oberschütze.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Oberschütze.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}

elseif ($point >= 500 && $point < 1000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Sturmmann.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Sturmmann.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Sturmmann.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}

elseif ($point >= 1000 && $point < 5000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Rottenführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Rottenführer.png\' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Rottenführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 5000 && $point < 10000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Unterscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Unterscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Unterscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 10000 && $point < 20000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Scharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Scharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Scharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 20000 && $point < 30000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Oberscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Oberscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Oberscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 30000 && $point < 40000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Hauptscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Hauptscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Hauptscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 40000 && $point < 50000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Sturmscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Sturmscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Sturmscharführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 50000 && $point < 55000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Untersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Untersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Untersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 55000 && $point < 60000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Obersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Obersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Obersturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 60000 && $point < 65000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Hauptsturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Hauptsturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Hauptsturmführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 65000 && $point < 70000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Sturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Sturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Sturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 70000 && $point< 75000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Obersturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Obersturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Obersturmbannführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 75000 && $point < 80000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Standartenführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Standartenführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Standartenführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 80000 && $point < 85000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Oberführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Oberführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Oberführer.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 85000 && $point < 90000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Brigadeführer und Generalmajor der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Brigadeführer und Generalmajor der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Brigadeführer und Generalmajor der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 90000 && $point < 95000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Gruppenführer und Generalleutnant der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Gruppenführer und Generalleutnant der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Gruppenführer und Generalleutnant der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 95000 && $point < 100000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Obergruppenführer und General der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Obergruppenführer und General der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Obergruppenführer und General der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
elseif ($point >= 100000){
    $pointupdate = "UPDATE users SET collar_badges = 'pictures/ranks and insignia/Collar badges/SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate);
    $pointupdate1 ="UPDATE users SET shoulder_straps = 'pictures/ranks and insignia/Shoulder straps and sleeves/SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate1);
    $pointupdate2 = "UPDATE users SET parka = 'pictures/ranks and insignia/Sleeve(parka)/SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png' WHERE name = '".$poster."'";
    mysqli_query($conn, $pointupdate2);
}
