<?php

	include 'functions.php';

	if(isset($_POST['submit'])) {
		
		$access = 0;
		$username = $_POST['username'];
		$password = $_POST['password'];		
		
		$dbh = db_connect("lightwir_oefenen","lightwir_oefenen","lightwir_oefenen","localhost");
		
		$query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'"; 
					
		//$results = db_select_query($dbh,$query);
		
		$results = db_select_exec($dbh,$username,$password);
	
		if($results != null) {
			foreach($results as $row) {
				if($row->username === $username && $row->password === $password) {
					
					session_start();					
					$_SESSION['username'] = $row->username;
					
					header("location:dashboard.php");
					exit();
						
				}
			}			
		} else {
			echo "Login Unsuccesfull!";
		}
		
	}

?>