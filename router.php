<?php
	defined("_JEXEC") or die;
	function getCurrentSection(){
		global $CurrentSection;
		return $CurrentSection;
	}
function route($PageName, $Section){
	global $CurrentSection;
	$CurrentSection = $Section;
	
	$Includement = array();
	switch( $Section ){
	 	case "css" : 
	 				
				$Includement[] = "modules/css/css.php"; break;
	 	case "title" : 
	 				
				$Includement[] = "modules/title/title.php"; break;
	 	case "main" : 
	 		
		if( $PageName =="registration.html" ||  $PageName =="qualification.html" ||  $PageName =="candidate-login.html" ||  $PageName =="login.html" ||  $PageName =="course-registration.html" ||  $PageName =="classroom.html" ||  $PageName =="admission-status.html" ||  $PageName =="clearance-status.html" ||  $PageName =="login-management.html" ||  $PageName =="student-details.html" ||  $PageName =="student-dashboard.html" ||  $PageName =="dynamic-text.html" ||  $PageName =="ddynamic-text.html" ||  $PageName =="user-dashboard.html" ||  $PageName =="timetable.html" ||  $PageName =="la-news.html") { 
				if( $PageName =="registration.html"){
				$Includement[] = "modules/registration/registration.php";
			}
			if( $PageName =="qualification.html"){
				$Includement[] = "modules/qualification/qualification.php";
			}
			if( $PageName =="candidate-login.html"){
				$Includement[] = "modules/appl_login_form/appl_login_form.php";
			}
			if( $PageName =="login.html"){
				$Includement[] = "modules/login_form/login_form.php";
			}
			if( $PageName =="course-registration.html"){
				$Includement[] = "modules/course_registration/course_registration.php";
			}
			if( $PageName =="classroom.html"){
				$Includement[] = "modules/chat/chat.php";
			}
			if( $PageName =="admission-status.html"){
				$Includement[] = "modules/admission_status/admission_status.php";
			}
			if( $PageName =="clearance-status.html"){
				$Includement[] = "modules/clearance_status/clearance_status.php";
			}
			if( $PageName =="login-management.html"){
				$Includement[] = "modules/manage_login/manage_login.php";
			}
			if( $PageName =="student-details.html"){
				$Includement[] = "modules/student_details/student_details.php";
			}
			if( $PageName =="student-dashboard.html"){
				$Includement[] = "modules/dashboard_s/dashboard_s.php";
			}
			if( $PageName =="dynamic-text.html"){
				$Includement[] = "modules/dynamic_text/dynamic_text.php";
			}
			if( $PageName =="ddynamic-text.html"){
				$Includement[] = "modules/ddynamic_text/ddynamic_text.php";
			}
			if( $PageName =="user-dashboard.html"){
				$Includement[] = "modules/welcome/welcome.php";
			}
			if( $PageName =="timetable.html"){
				$Includement[] = "modules/timetable/timetable.php";
			}
			if( $PageName =="la-news.html"){
				$Includement[] = "modules/la_news/la_news.php";
			}
		}else		
				$Includement[] = "modules/view_article/view_article.php"; break;
	 	case "left-pane" : 
	 				
				$Includement[] = "modules/view_pane_menu/view_pane_menu.php"; break;
	 	case "footer" : 
	 				
				$Includement[] = "modules/footer/footer.php"; break;
	 	case "debug" : 
	 				
				$Includement[] = "modules/debug/debug.php"; break;
	 	case "menu" : 
	 				
				$Includement[] = "modules/menu/menu.php"; break;
	 	case "scripts" : 
	 				
				$Includement[] = "modules/scripts/scripts.php"; break;
	}
	
	return $Includement;
}