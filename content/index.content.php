<?php

	include 'databasehandler.php';

	$dbh = db_connect("lightwir_oefenen","lightwir_oefenen","lightwir_oefenen","localhost");

	$query = "SELECT * FROM users WHERE username = " . $username " AND"
	$results = db_select($dbh,"*","users");
	

?>
