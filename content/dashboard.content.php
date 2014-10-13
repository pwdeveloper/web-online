<?php

	include 'functions.php';


	const PRINT_XML = 0;
	const AUTO_TWITTER_POST = 0;
	const AUTO_TWITTER_SEARCH = 1;

	if(session_verify()) {
		
		$username = $_SESSION['username'];
		
		// query users
		$dbh = db_connect("lightwir_oefenen","lightwir_oefenen","lightwir_oefenen","localhost");
		$query_users = "SELECT * FROM users";		
		$results_users = db_select_query($dbh,$query_users);
		
		//query documents
		$query_documents = "SELECT * FROM documents";
		$results_documents = db_select_query($dbh,$query_documents);
		
		//write documents to XML using SimpleXML
		if(isset($results_documents))
		{
			instantiate_xml_documents("documents.xml");
			
			foreach($results_documents as $documents) {
				add_xml_document("documents.xml", $documents->id, $documents->title, $documents->organisation, $documents->priviliges);	
			}
			
		}		
		
		//print XML to screen using SimpleXML
		if(PRINT_XML == 1) {
			Header('Content-type: text/xml');		
			echo print_xml_documents("documents.xml");
			exit();			
		}
		
		//write documents to XML using DOM
		
		add_xml_document_DOM("documents.xml","DOM-titel","DOM-organisation","1");
		
	
	} else {
		header("location:login.php");
	}	
	
	if(AUTO_TWITTER_POST == 1) {
		$twitterpost = '';
		$status = 'AutoPost Twitter using CodeBird and Twitter REST API';
		if(TwitterPost($status) == 200){
			$twitterpost = "wel succesvol";
		}
		else {
			$twitterpost = "niet succesvol";
		}
	}
	else {
		$twitterpost = "uitgeschakeld";
	}


	if(AUTO_TWITTER_SEARCH == 1) {
		
		global $query;
		
		//UTRECHT
		$geocode = '52.0916670,5.1177780,100mi';
		$count = '3';
		$query = 'nederland';
		
		$twittersearch = 'ingeschakeld';
		$reply = TwitterSearchTweets($query, $count, $geocode);
		
	} else {
		$twittersearch = 'uitgeschakeld';
	}


	




?>
