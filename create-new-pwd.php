
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
    <script src="dropdown.js"></script>
    <link rel="stylesheet" href="pwdreset.css">
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
        <div id="main">
            <?php
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];
                if (empty($selector) || empty($validator)){
                    echo "Could not validate your request!";
                }
                else{
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                        echo '<h1>Reset your password</h1>
            <form action="pwdreset2.inc.php" method="post">
                <label for="pwd1">Password</label><br>
                <input type="hidden" name="selector" value="'.$selector.'">
                <input type="hidden" name="validator" value="'.$validator.'">
                <input id="pwd1" type="password" required class="pwdinput" name="pwd1">
                <br>
                <label for="pwd2">Repeat your password</label><br>
                <input id="pwd2" type="password" required class="pwdinput" name="pwd2">
                <br>
                <button id="pwdresetbtn" type="submit" name="pwdresetsubmit">Reset password</button>
            </form>';
                    }
                }
            ?>

        </div>
    </center>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
