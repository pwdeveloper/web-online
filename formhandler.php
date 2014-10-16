<?php

	include 'libraries/functions.php';

	if(isset($_POST['submit'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];		
		
		$clean_username;
		$clean_password;
		
		if(preg_match("/^[a-zA-Z0-9_\-]+$/", $username)) {
			$clean_username = $username;
		} else {
			echo "Username format invalid!";
			exit();
		}
		if(preg_match("/^[a-zA-Z0-9_\-]+$/", $password)) {			
			$clean_password = $password;
		} else {
			echo "Password format invalid!";
			exit();
		}
		
		if(isset($clean_username) && isset($clean_password)) {
			
			$dbh = db_connect("lightwir_oefenen","lightwir_oefenen","lightwir_oefenen","localhost");
			$results = db_select_exec($dbh,$username);
			
			if($results[0]->username === $clean_username && password_verify($clean_password, $results[0]->password)) {
				session_start();
				session_regenerate_id();										
				$_SESSION['username'] = $results[0]->username;
				header("location:dashboard.php");
				exit();	
			}
			else {
				echo "Login unsuccesfull!";
				exit();
			}
		} else {
			echo "Please fill out a valid Username and Password!";
			exit();
		}		
	}

?>