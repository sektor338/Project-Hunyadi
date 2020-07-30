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
    <link rel="stylesheet" href="supporters.css">
    <link rel="stylesheet" href="main.css">
    <script src="dropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Eagle's Nest</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<main>
    <center>
        <div id="title">
            <a id="titlea">People who support us</a>
        </div>
        <br>
        <div id="maindiv">
                <?php
                include_once 'dbh.inc.php';
                $sql = "SELECT * FROM users WHERE patreon NOT LIKE 'pictures/ranks and insignia/Sleeve(parka)/trans.png'";
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