<?php




function db_connect($db_name,$db_user,$db_password,$db_host) {
	
	try {	
		$dsn = "mysql:host=".$db_host.";dbname=".$db_name."";
		$dbh = new PDO($dsn, $db_user, $db_password); 
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE); 
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo "Error" . $e->getMessage();
	}

	return $dbh;
}

function db_select_query($param_dbh,$param_query) {
	
	$sth = $param_dbh->query($param_query); 
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	
	return $results;		
}

function db_select_exec($param_dbh, $username, $password) {
	
	$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
	
	$stmt = $param_dbh->prepare($sql);
	$stmt->setFetchMode(PDO::FETCH_OBJ);
	
	$stmt->bindParam(":username", $username);
	$stmt->bindParam(":password", $password);    
    $stmt->execute();
	$results = $stmt->fetchAll();
	
	return $results;
}






?>