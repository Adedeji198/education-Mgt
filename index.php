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
							case "login.html":
							case "enroll.html":
							case "registration-details.html":
							case "admission-status.html":
							case "clearance-status.html":
							case "registration-success.html":
							case "candidate-login.html":
							case "registration.html":
							case "login-management.html":
							case "about-us.html":
							case "user-dashboard.html":
							case "qualification.html":
							case "course-registration.html":
							case "classroom.html":
							case "student-dashboard.html":
							case "student-details.html":
							case "dynamic-text.html":
							case "ddynamic-text.html":
							case "la-news.html":
							case "home.html":  include("templates/default/index.php"); break ;
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
