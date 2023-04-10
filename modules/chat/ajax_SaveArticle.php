<?php
include '../../admin/forbidden/db_connect.php';

session_start();

if(
	isset($_POST['task']) &&
	'delete' == $_POST['task']
){
	deleteArticle();
	die;
}else if(
	isset($_POST['task']) &&
	"fetch" == $_POST['task']
){
	fetchArticle();
	die;
}

if( "" == $_POST['article-id']){
	echo saveArticle();
}else{
	echo updateArtcle();
}

function saveArticle(){
	global $PDO; 
	$query = "INSERT INTO articles 
	(url, course, section, category, title, levl, author, status,string) 
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) "; 
	
	$pds = $PDO->prepare($query); 

	/******showPrepedQuery(
		$query, /****/
	$pds->execute( /****/ 
		array(
			("yes" == $_POST['publish'])?$_POST["url"]:"",
			$_POST["course"], 
			$_POST["section"], 
			$_POST["category"], 
			"no-title", 
			"0", 
			$_SESSION["userid"], 
			"1",
			$_POST["text"], 
		) 
	); 
	
	return $PDO->lastInsertId();
}

function updateArtcle(){
	global $PDO; 
	$query = "UPDATE articles SET string= ?, url=? WHERE id= ? "; 
	$pds = $PDO->prepare($query);
	

	/***showPrepedQuery($query, /****/
	$pds->execute( /****/
			array(
			$_POST["text"],
			("yes" == $_POST['publish'] ) ? $_POST["url"]:"",
			$_POST["article-id"]
			
			
			) 
		); 	
	return $_POST["article-id"];
}

function deleteArticle(){
	global $PDO; 
	$query = "DELETE FROM articles WHERE id= ? "; 

	$pds = $PDO->prepare($query);

	/***showPrepedQuery(
		$query, /****/
	 
	$pds->execute( /****/
			array(
			$_POST["article-id"]			
			) 
		); 	
		echo "delete";
}

function fetchArticle(){
	global $PDO; 
	$query = "SELECT * FROM articles WHERE course= ? ";
	$pds = $PDO->prepare($query);

	/***showPrepedQuery( $query, /****/
	$pds->execute( /****/
		array($_POST["course-id"]) 
	);

	$Res = $pds->fetchAll(2);

	/*
Array
(
    [0] => Array
        (
            [id] => 22
            [string] => <p>The article for this lesson is found <a href="/edu-prj/file-uploads/598820a60140edee3a08dc51b42fea7b.pdf">here</a></p>
            [title] => no-title
            [category] => 9
            [url] => classroom.html
            [section] => main
            [timecode] => 
            [levl] => 0
            [author] => 24
            [course] => 4
            [status] => 1
        )

)
	*/

	$Str = '<ul>'."\n" ;  
	foreach($Res AS $key=> $stuff) {
		$Str .= ''.'<li class="article-list" style="cursor: pointer">'.substr(strip_tags($stuff['string']), 0,25).'...<span style="display: none">'.$stuff['string'].'</span><input type="hidden" value="'.$stuff['id'].'" /></li>'."\n" ;  
	} 
	$Str .= '</ul>';
	echo $Str;
}
?> 