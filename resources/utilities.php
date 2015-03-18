<?php

// Logs user's IP for traffic analysis purposes
function logUserVisit($ip_address, $path) {
	$time = gmdate("Y-m-d H:i:s");
	$sql = "INSERT INTO visitors (ip, timestamp, location) VALUES ('$ip_address', '$time', '$path')";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	return $result;
}

// Inserts a new swipe in the swipe table
function insertSwipe($email, $name, $phone_number, $swipe_qty, $swipe_price) {
	$time = gmdate("Y-m-d H:i:s");
	$email = mysql_real_escape_string($email);
	$name = mysql_real_escape_string($name);
	$phone_number = mysql_real_escape_string($phone_number);
	$swipe_qty = mysql_real_escape_string($swipe_qty);
	$swipe_price = mysql_real_escape_string($swipe_price);
	$uid = getToken(10);
	$sql = "INSERT INTO swipes (uid, email, user_name, phone_number, quantity, price, time) VALUES ('$uid', '$email', '$name', '$phone_number', '$swipe_qty', '$swipe_price', '$time');";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	return $uid;
}

// Retrieves swipe from database
function retrieveSwipe($uid) {
	$uid = mysql_escape_string($uid);
	$sql = "SELECT email, user_name, phone_number, quantity, price FROM swipes WHERE uid='$uid';";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	$row = mysql_fetch_array($result);
	return $row;
}

// Deletes swipe from database
function deleteSwipe($uid) {
	$uid = mysql_real_escape_string($uid);
	$sql = "DELETE FROM swipes WHERE uid = '$uid';";
	mysql_query($sql, $_SESSION["bumdb"]);
}

// Updates phone number
function updatePhoneNumber($uid, $phone_number) {
	$uid = mysql_real_escape_string($uid);
	$phone_number = mysql_real_escape_string($phone_number);
	$sql = "UPDATE swipes SET phone_number = '$phone_number' WHERE uid = '$uid';";
	mysql_query($sql, $_SESSION["bumdb"]);
}

// Updates price
function updatePrice($uid, $price) {
	$uid = mysql_real_escape_string($uid);
	$price = mysql_real_escape_string($price);
	$sql = "UPDATE swipes SET price = '$price' WHERE uid = '$uid';";
	mysql_query($sql, $_SESSION["bumdb"]);
}

// Updates quantity
function updateQuantity($uid, $quantity) {
	$uid = mysql_real_escape_string($uid);
	$price = mysql_real_escape_string($quantity);
	$sql = "UPDATE swipes SET quantity = '$quantity' WHERE uid = '$uid';";
	mysql_query($sql, $_SESSION["bumdb"]);
}

// Checks if the given uid is valid
function validUID($uid) {
	$uid = mysql_real_escape_string($uid);
	$sql = "SELECT * FROM swipes WHERE uid='$uid' LIMIT 1;";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	$num_rows = mysql_num_rows($result);
	if ($num_rows > 0) {
		return true;
	} else {
		return false;
	}
}

function displaySearchResults($maxAmount) {
	$maxAmount = mysql_real_escape_string($maxAmount);
	$sql = "SELECT id, user_name, quantity, price FROM swipes WHERE price <= '$maxAmount' ORDER BY price ASC, time DESC;";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	echo '<table class="table page-text">';
	echo "<tr> <td>Name</td><td>Phone Number</td><td>Quantity</td><td>Price</td> </tr><tbody>";
	while ($row = mysql_fetch_array($result)) {
    	printf("<tr><td>%s</td><td><div class='number-holder' id='" . $row[0] . "'><button type='submit' id='" . $row[0] . "' class='btn btn-info phone-number'>Show Number</button></div></td><td>%s</td><td>$%s</td></tr>", $row[1], $row[2], $row[3]);  
	}
	echo "</tbody></table>";
}

function getAveragePrice() {
	$sql = "SELECT AVG(price) FROM swipes;";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	$avg_price = mysql_fetch_array($result)[0];
	return round($avg_price, 0);
}

function retrieveNumber($id) {
	$id = mysql_real_escape_string($id);
	$sql = "SELECT phone_number FROM swipes WHERE id=" . $id . ";";
	$result = mysql_query($sql, $_SESSION['bumdb']);
	$number = mysql_fetch_array($result)[0];
	return $number;
}


// Courtesy of Stackoverflow: generate unique tokens
function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
}

function getToken($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for ($i = 0; $i < $length ; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
    }
    return $token;
}