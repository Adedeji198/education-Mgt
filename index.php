<?php
		
	$CurrentSection ="";
	global $CurrentSection;
	define ("_JEXEC",1);	


	//Database connection
	$PDO = "";
	include ("forbidden/db_connect.php");
	
		
	// Get page name
	if( isset($_GET["p"])  ){
		$PageName = $_GET["p"];
	}else{
		$Path = parse_url($_SERVER["REQUEST_URI"])   ;
		$Path = $Path["path"];
		$PageName = basename($Path);
	}

	if(
		$PageName == "" ||
		$PageName == basename(SITE_FOLDER) ||
		$PageName == "admin"
	){
		$PageName = "index.php";
	}

		
		
			switch($PageName ){
			
							case "index.php":
							case "manage-categories.html":
							case "search-articles.html":
							case "manage-users.html":
							case "login.html":
							case "manage-pane-menu.html":
							case "exam-management.html":
							case "subject-management.html":
							case "admission-mgt.html":
							case "manage-courses.html":
							case "manage-student.html":
							case "manage-lecturer.html":
							case "assign-courses.html":
							case "upload-files.html":
							case "send-notification.html":
							case "manage-user-account.html":  include("templates/default/index.php"); break ;
					default: 
						echo "the url does not exist";
						break;					
				}

//====================================
/*
function substract($Base,$Path){
	return substr($Path,strlen($Base));
}				
*/
