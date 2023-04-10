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
	 	case "footer" : 
	 				
				$Includement[] = "modules/footer/footer.php"; break;
	 	case "page-title" : 
	 				
				$Includement[] = "modules/title/title.php"; break;
	 	case "css" : 
	 				
				$Includement[] = "modules/css/css.php"; break;
	 	case "shared_objects" : 
	 				
				$Includement[] = "modules/shared_objects/shared_objects.php"; break;
	 	case "menu" : 
	 		
		if( $PageName =="login.html") { 
				if( $PageName =="login.html"){
				$Includement[] = "modules/empty/empty.php";
			}
		}else		
				$Includement[] = "modules/menu/menu.php"; break;
	 	case "main-content" : 
	 		
		if( $PageName =="manage-site-mail.html" ||  $PageName =="send-notification.html" ||  $PageName =="search-articles.html" ||  $PageName =="manage-users.html" ||  $PageName =="login.html" ||  $PageName =="manage-categories.html" ||  $PageName =="manage-pane-menu.html" ||  $PageName =="exam-management.html" ||  $PageName =="subject-management.html" ||  $PageName =="admission-mgt.html" ||  $PageName =="manage-courses.html" ||  $PageName =="manage-student.html" ||  $PageName =="manage-lecturer.html" ||  $PageName =="assign-courses.html" ||  $PageName =="upload-files.html") { 
				if( $PageName =="manage-site-mail.html"){
				$Includement[] = "modules/manage_mail/manage_mail.php";
			}
			if( $PageName =="send-notification.html"){
				$Includement[] = "modules/notification/notification.php";
			}
			if( $PageName =="search-articles.html"){
				$Includement[] = "modules/article/article.php";
			}
			if( $PageName =="manage-users.html"){
				$Includement[] = "modules/manage_user/manage_user.php";
			}
			if( $PageName =="login.html"){
				$Includement[] = "modules/login/login.php";
			}
			if( $PageName =="manage-categories.html"){
				$Includement[] = "modules/categories/categories.php";
			}
			if( $PageName =="manage-pane-menu.html"){
				$Includement[] = "modules/manage_pane_menu/manage_pane_menu.php";
			}
			if( $PageName =="exam-management.html"){
				$Includement[] = "modules/manage_exams/manage_exams.php";
			}
			if( $PageName =="subject-management.html"){
				$Includement[] = "modules/manage_subjects/manage_subjects.php";
			}
			if( $PageName =="admission-mgt.html"){
				$Includement[] = "modules/manage_admiission/manage_admiission.php";
			}
			if( $PageName =="manage-courses.html"){
				$Includement[] = "modules/manage_courses/manage_courses.php";
			}
			if( $PageName =="manage-student.html"){
				$Includement[] = "modules/manage_student/manage_student.php";
			}
			if( $PageName =="manage-lecturer.html"){
				$Includement[] = "modules/manage_lecturer/manage_lecturer.php";
			}
			if( $PageName =="assign-courses.html"){
				$Includement[] = "modules/lecturer_course/lecturer_course.php";
			}
			if( $PageName =="upload-files.html"){
				$Includement[] = "modules/uplload_files/uplload_files.php";
			}
		}else		
				$Includement[] = "modules/main_content/main_content.php"; break;
	 	case "hidden" : 
	 				
				$Includement[] = "modules/empty/empty.php"; break;
	 	case "top_navbar" : 
	 		
		if( $PageName =="login.html") { 
				if( $PageName =="login.html"){
				$Includement[] = "modules/empty/empty.php";
			}
		}else		
				$Includement[] = "modules/top_navbar/top_navbar.php"; break;
	 	case "crumbs" : 
	 		
		if( $PageName =="login.html") { 
				if( $PageName =="login.html"){
				$Includement[] = "modules/empty/empty.php";
			}
		}else		
				$Includement[] = "modules/page_crumbs/page_crumbs.php"; break;
	 	case "debug" : 
	 				
				$Includement[] = "modules/debug/debug.php"; break;
	 	case "status_module" : 
	 				
				$Includement[] = "modules/status_module/status_module.php"; break;
	}
	
	return $Includement;
}