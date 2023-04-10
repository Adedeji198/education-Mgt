<?php 
class article{
/*_______________________________________________________________*/	
	function onAfterInitialise(){

		if(
			isset($_POST["task"]) &&
			$_POST["task"]== "article.create-category" 
		){
			$this->saveData();

		}else if(	isset($_POST["task"]) &&
			$_POST["task"]== "article.save" 
		){
				$this->saveArticle();
		}else if(	isset($_POST["task"]) &&
			$_POST["task"]== "article.save-upload" 
		){
				$this->saveUpload();
		}
	}
/*_____________________________________________________________*/	
	function saveData(){
		global $PDO;
		$query = "INSERT INTO categories (  name, levl,parent)
		VALUES( ?, ?, ? )";

		$pds = $PDO->prepare($query); 		$pds->execute( 
			array(
			$_POST["name"], 
			$_POST["level"],
			'0'
			) 
		);

	}

/*_______________________________________________________________*/
	function saveArticle(){

		if(
			isset($_POST['article-id']) &&
			'' != trim($_POST['article-id'])
		){
			$this->updateArticle();
			return;
		}
		
		global $PDO; 
		$timestp = date('Y-m-d H:i:s');
		
		$query = "INSERT INTO articles 
		(string, title, category, section, url, timecode,status)
		VALUES (?, ?, ?, ?, ?, ?,?) "; 
		$pds = $PDO->prepare($query); 
		$pds->execute( 
			array(
				$_POST["article_text"], 
				$_POST["article-title"], 
				$_POST["category"], 
				$_POST["section"], 
				$_POST["article-url"], 
				$timestp,
				'1'
			) 
		); 		
		
		
	}
/*______________________________________________________________*/	
	function updateArticle(){
		global $PDO; 
		$query = "UPDATE articles SET string= ?, title= ?, category= ?,
		 section= ?, url= ?  
		WHERE id= ? "; 
		$pds = $PDO->prepare($query); 
		

		$pds->execute( 
			array(
				$_POST["article_text"], 
				$_POST["article-title"], 
				$_POST["category"], 
				$_POST["section"], 
				$_POST["article-url"], 
				$_POST["article-id"]
			) 
		); 		
	}
/*_______________________________________________________________*/	
	function saveUpload(){
		global $PDO; 
		$query = "INSERT INTO file_upload (title, url) VALUES (?, ?) "; 
		$pds = $PDO->prepare($query); 
		$pds->execute( array($_POST["title"], $_POST["url"]) );
	}
/*______________________________________________________________*/	

} ?>