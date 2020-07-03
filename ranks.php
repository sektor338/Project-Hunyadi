<?php
include 'dbh.inc.php';

$collar = "SS-Schütze.png";
$straps = "SS-Schütze.png";
$sleeve = "trans.png";

if ($_SESSION['points'] >= 100 && $_SESSION['points'] < 500){
    $collar = "SS-Oberschütze.png";
    $straps = "SS-Oberschütze.png";
    $sleeve = "SS-Oberschütze.png";
}

elseif ($_SESSION['points'] >= 500 && $_SESSION['points'] < 1000){
    $collar = "SS-Sturmmann.png";
    $straps = "SS-Sturmmann.png";
    $sleeve = "SS-Sturmmann.png";
}

elseif ($_SESSION['points'] >= 1000 && $_SESSION['points'] < 5000){
    $collar = "SS-Rottenführer.png";
    $straps = "SS-Rottenführer.png";
    $sleeve = "SS-Rottenführer.png";
}
elseif ($_SESSION['points'] >= 5000 && $_SESSION['points'] < 10000){
    $collar = "SS-Unterscharführer.png";
    $straps = "SS-Unterscharführer.png";
    $sleeve = "SS-Unterscharführer.png";
}
elseif ($_SESSION['points'] >= 10000 && $_SESSION['points'] < 20000){
    $collar = "SS-Scharführer.png";
    $straps = "SS-Scharführer.png";
    $sleeve = "SS-Scharführer.png";
}
elseif ($_SESSION['points'] >= 20000 && $_SESSION['points'] < 30000){
    $collar = "SS-Oberscharführer.png";
    $straps = "SS-Oberscharführer.png";
    $sleeve = "SS-Oberscharführer.png";
}
elseif ($_SESSION['points'] >= 30000 && $_SESSION['points'] < 40000){
    $collar = "SS-Hauptscharführer.png";
    $straps = "SS-Hauptscharführer.png";
    $sleeve = "SS-Hauptscharführer.png";
}
elseif ($_SESSION['points'] >= 40000 && $_SESSION['points'] < 50000){
    $collar = "SS-Sturmscharführer.png";
    $straps = "SS-Sturmscharführer.png";
    $sleeve = "SS-Sturmscharführer.png";
}
elseif ($_SESSION['points'] >= 50000 && $_SESSION['points'] < 55000){
    $collar = "SS-Untersturmführer.png";
    $straps = "SS-Untersturmführer.png";
    $sleeve = "SS-Untersturmführer.png";
}
elseif ($_SESSION['points'] >= 55000 && $_SESSION['points'] < 60000){
    $collar = "SS-Obersturmführer.png";
    $straps = "SS-Obersturmführer.png";
    $sleeve = "SS-Obersturmführer.png";
}
elseif ($_SESSION['points'] >= 60000 && $_SESSION['points'] < 65000){
    $collar = "SS-Hauptsturmführer.png";
    $straps = "SS-Hauptsturmführer.png";
    $sleeve = "SS-Hauptsturmführer.png";
}
elseif ($_SESSION['points'] >= 65000 && $_SESSION['points'] < 70000){
    $collar = "SS-Sturmbannführer.png";
    $straps = "SS-Sturmbannführer.png";
    $sleeve = "SS-Sturmbannführer.png";
}
elseif ($_SESSION['points'] >= 70000 && $_SESSION['points'] < 75000){
    $collar = "SS-Obersturmbannführer.png";
    $straps = "SS-Obersturmbannführer.png";
    $sleeve = "SS-Obersturmbannführer.png";
}
elseif ($_SESSION['points'] >= 75000 && $_SESSION['points'] < 80000){
    $collar = "SS-Standartenführer.png";
    $straps = "SS-Standartenführer.png";
    $sleeve = "SS-Standartenführer.png";
}
elseif ($_SESSION['points'] >= 80000 && $_SESSION['points'] < 85000){
    $collar = "SS-Oberführer.png";
    $straps = "SS-Oberführer.png";
    $sleeve = "SS-Oberführer.png";
}
elseif ($_SESSION['points'] >= 85000 && $_SESSION['points'] < 90000){
    $collar = "SS-Brigadeführer und Generalmajor der Waffen-SS.png";
    $straps = "SS-Brigadeführer und Generalmajor der Waffen-SS.png";
    $sleeve = "SS-Brigadeführer und Generalmajor der Waffen-SS.png";
}
elseif ($_SESSION['points'] >= 90000 && $_SESSION['points'] < 95000){
    $collar = "SS-Gruppenführer und Generalleutnant der Waffen-SS.png";
    $straps = "SS-Gruppenführer und Generalleutnant der Waffen-SS.png";
    $sleeve = "SS-Gruppenführer und Generalleutnant der Waffen-SS.png";
}
elseif ($_SESSION['points'] >= 95000 && $_SESSION['points'] < 100000){
    $collar = "SS-Obergruppenführer und General der Waffen-SS.png";
    $straps = "SS-Obergruppenführer und General der Waffen-SS.png";
    $sleeve = "SS-Obergruppenführer und General der Waffen-SS.png";
}
elseif ($_SESSION['points'] >= 100000){
    $collar = "SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png";
    $straps = "SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png";
    $sleeve = "SS-Oberst-Gruppenführer und Generaloberst der Waffen-SS.png";
}
?>
