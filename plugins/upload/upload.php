<?php class upload{
	function onAfterInitialise(){
		if(
			isset($_POST['task']) &&
			"article.save-upload" == $_POST['task']
		){
			$this->saveUploadedFile();
		}

	}

	function saveUploadedFile(){
		global $PDO; 

		$query = "INSERT INTO file_upload (title, url) 
		VALUES (?, ?) "; 
		
		$pds = $PDO->prepare($query); 
		/***showPrepedQuery( $query, /***/
		$pds->execute( /***/
		array($_POST["title"], $_POST["url"]) );	
	}
} ?>