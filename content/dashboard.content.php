<?php

	include 'functions.php';

	Twitter();

	const PRINT_XML = 0;

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

?>
