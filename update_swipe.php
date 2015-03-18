<?php
require('resources/config.php');
require('resources/utilities.php');

if (empty($_GET['uid']) or !(validUID($_GET['uid']))) {
	$destination = "index.php";
} else {
	$uid = mysql_escape_string($_GET["uid"]);
	if (isset($_POST["delete"])) {
		deleteSwipe($uid);
		$destination = "index.php";
	} else if (isset($_POST["update"])) {
		$destination = "modify_swipe.php?uid=" . $uid;
		$phone_number = $_POST["phone"];
		$quantity = $_POST["quantity"];
		$price = $_POST["price"];
		if ($phone_number != "") {
			updatePhoneNumber($uid, $phone_number);
		}

		if ($quantity != "") {
			updateQuantity($uid, $quantity);
		}

		if ($price != "") {
			updatePrice($uid, $price);
		}
	}
}





header("Location: " . $destination);
?>