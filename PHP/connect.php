<?php

	//LOCALHOST
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$ddbb = "salerosi";
	
	//HOSTINGER
	$serverH = "mysql.hostinger.es";
	$userH = "u815586139_admin";
	$passH = "admin123";
	$ddbbH = "u815586139_saler";
	
	$conn = new mysqli($serverH, $userH, $passH, $ddbbH); //HOSTINGER
	
	//Konexioa konprobatu
	if ($conn->connect_error) {
		$conn = new mysqli($servername, $username, $password, $ddbb); //LOCALHOST
		if (!$conn) {
			die("Ezin izan da konexioa ezarri: " . $conn->connect_error);
		}
	}
	
	//Saioa hasi
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>
