<?php
require('resources/config.php');
require('resources/utilities.php');

if (!isset($_SESSION['find_swipes'])) {
	echo "Can't let you do that StarFox";
}


echo retrieveNumber($_POST['id']);