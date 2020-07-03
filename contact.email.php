<?php

$to = "hdsektor38@gmail.com";
$subject = $_POST['c-subject'] . PHP_EOL;
$message = "Name: " . $_POST['c-name'] . PHP_EOL;
$message .= "Email: " . $_POST['c-email'] . PHP_EOL;
$message .= "Message: " . $_POST['c-text'] . PHP_EOL;

if (@mail($to, $subject, $message)) {
  header("Location: index.php");
} else {
  header("Location: contacterror.php");
}
?>
