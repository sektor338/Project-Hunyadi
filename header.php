<?php
session_start();
include_once 'dbh.inc.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="apple-touch-icon" sizes="180x180" href="/pictures/logo/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/pictures/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/pictures/logo/favicon-16x16.png">
<link rel="manifest" href="/pictures/logo/site.webmanifest">
<link rel="shortcut icon" href="/pictures/logo/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="/pictures/logo/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="description" content="Home of the HDL refugees and the best place on the internet.">
<meta name="author" content="Martin Mészáros">
<link href="https://fonts.googleapis.com/css?family=Germania+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="mainpages.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="comment.css">
<?php
if (isset($_SESSION['username'])) {
    echo '<script type="text/javascript" src="like.js"></script>';
    echo '<script type="text/javascript" src="comment.js"></script>';
    if ($_SESSION['username'] == "LySS"){
        header("Location: auschwitz.php");
    }
}

?>
<script src="dropdown.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Eagle's Nest</title>
