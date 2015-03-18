<?php

$db_host = 'bumswipes.davidlepe.com';
$db_name = 'bumswipes';
$db_username = 'bumswipes_admin';
$db_password = 'vVq-BQK-KrE-V8L';

session_start(); 
$_SESSION['bumdb'] = mysql_connect($db_host, $db_username, $db_password)or die("cannot connect to server");
mysql_select_db($db_name, $_SESSION['bumdb']);
