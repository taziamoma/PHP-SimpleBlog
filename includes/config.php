<?php
ob_start();
session_start();

$host = "localhost";
$user = "root";
$pass = "";

try {
	$db = new PDO("mysql:host=$host;dbname=blog", $user, $pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: ". $e->getMessage();
}

date_default_timezone_set('America/Chicago');

//load clases 



?>