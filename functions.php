<?php

include 'libraries/EpiCurl.php';
include 'libraries/EpiOAuth.php';
include 'libraries/EpiTwitter.php';



/////////////////////////////////////////////		DATABASE


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
	$sth->setFetchMode(PDO::FETCH_OBJ); 
	$results = $sth->fetchAll();
	
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



function Twitter(){ 
	
	$consumer_key = 'QmlneqbGUilhBCZ5UYeaRghRk';
	$consumer_secret = 'zOMTQmppg6Y4FD2SYJKE7fCemyxk2XXggE8Z9dcO48OwhxrjKg';
	$token = '2815296646-zgnhCNPcgmychKwWyZF2fUWMhwiAq0EB54boYG0';
	$secret= 'kyHEFyYcL0imLhsgCZkLsSFvyY8WJNTIaACCzeJyQtKg5';
	$twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $token, $secret);
	
	//$twitterObjUnAuth = new EpiTwitter($consumer_key, $consumer_secret);
	
	$creds = $twitterObj->get('search/tweets.json', array('q' => 'volkskrant')); 
	
	
	//$timeline_telegraaf = $twitterObj->get('/users/show.json?screen_name=telegraaf');
	
	
	 
    echo "<pre>";
    var_dump($creds->response);
    echo "</pre>";
	exit();
	
}





/////////////////////////////////////////////		XML


function instantiate_xml_documents($name_file, $root_tags) {
	
	$newxml = new SimpleXMLElement("<documents></documents>");
	
	$newxml->addAttribute('xmlns:xmlns:docs','http://www.lightwire.nl/docs');
	
	$newxml->asXML($name_file);
}

function print_xml_documents($name_file) {

	$newxml = new SimpleXMLElement($name_file, NULL, true);
	return $newxml->asXML();
	
}

function add_xml_document($name_file,$title,$priviliges,$organisation) {
	
	$newxml = new SimpleXMLElement($name_file, NULL, true);
	
	$document = $newxml->addChild('document');
	
	$title = $document->addChild('title',$title);
	$priviliges = $document->addChild('priviliges',$priviliges);
	$organisation = $document->addChild('organisation',$organisation);
	
	$newxml->asXML('documents.xml');

}


function add_xml_document_DOM($name_file,$title,$priviliges,$organisation) {
	
	$dom = new DomDocument();
	$dom->load($name_file);
	
	$dom_document = $dom->createElement('document');
	$dom_document->setAttribute('xmlns:docs','http://www.lightwire.nl/docs');
	
	$dom_title = $dom->createElement('title',$title);
	$dom_document->appendChild($dom_title);

	$dom_organisation = $dom->createElement('organisation',$organisation);
	$dom_document->appendChild($dom_organisation);

	$dom_priviliges = $dom->createElement('priviliges',$priviliges);
	$dom_document->appendChild($dom_priviliges);

	$dom->documentElement->appendChild($dom_document);
	$dom->save($name_file);
	
}


/////////////////////////////////////////////		SESSIONS

function session_verify() {
	
	session_start();
	if(isset($_SESSION['username'])) {
		return TRUE;
	}
	else {
		return FALSE;
	}
	
}


/////////////////////////////////////////////		UTILITIES

function dump_variable($variable) {

	//Variable is ARRAY		
	if(isset($variable) && is_array($variable)) {

		echo "<br><br><b>Variable dump array:</b><br><br>";
	
		echo "var_dump: <pre>";
		var_dump($variable);
		echo "</pre><br>";
	
		foreach($variable as $element) {
			echo "<br><b>Variable dump array-elements:</b><br><br>";
		
			echo "var_dump: ";
			var_dump($element);
			echo "<br><br>";
			
			echo "printf: ";
			printf($element);
			echo "<br><br>";
			
			echo "print_r: ";
			print_r($element);
			echo "<br><br>";
			
			echo "echo variable: " . $element . "<br><br>";
		}		
	}
	//Variable is STRING
	else if(isset($variable) && is_string($variable)) {
	
		echo "<br><br><b>Variable dump:</b><br><br>";
		
		echo "var_dump: ";
		var_dump($variable);
		echo "<br><br>";
		
		echo "printf: ";
		printf($variable);
		echo "<br><br>";
		
		echo "echo variable: " . $variable . "<br><br>";
	}
}
	
function print_array($variable) {
	
	if(isset($variable) && is_array($variable)) {
		
		foreach($variable as $key => $value) {
			
			echo "key: " . $key . "<br>";
			echo "value: " . $value . "<br><br>";
			
			print_array($value);
		}
	}
	
}	



	
?>