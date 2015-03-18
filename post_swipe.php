<?php
require('resources/config.php');
require('resources/utilities.php');

$email = htmlspecialchars($_POST['email']);
$phone_number = htmlspecialchars($_POST['phone']);
$name = htmlspecialchars($_POST['name']);
$swipe_qty = htmlspecialchars($_POST['quantity']);
$swipe_price = htmlspecialchars($_POST['price']);
$uid = insertSwipe($email, $name, $phone_number, $swipe_qty, $swipe_price);


$to = $email;
$subject = "Your BumSwipes Listing [" . $uid . "] has been posted";
$message = "Thank you for using Bum Swipes. You may modify your listing at any time by visiting this link: http://www.bumswipes.com/modify_swipe.php?uid=" . $uid;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Bum Swipes <donotreply@bumswipes.com>' . "\r\n";
mail($to , $subject , $message, $headers);


$_SESSION['uid'] = $uid;
header('Location: swipe_submitted.php?uid=' . $uid . "&email=" . $email);
?>