<?php
	defined("_JEXEC") or die;
	
		
	
	include("plugins/login/login.php");
	$_login =  new login();
	$_login->onAfterInitialise();
	
	include("plugins/protect_page/protect_page.php");
	$_protect_page =  new protect_page();
	$_protect_page->onAfterInitialise();
	
	include("plugins/shared_objects_manager/shared_objects_manager.php");
	$_shared_objects_manager =  new shared_objects_manager();
	$_shared_objects_manager->onAfterInitialise();
	
	include("plugins/article/article.php");
	$_article =  new article();
	$_article->onAfterInitialise();
	
	include("plugins/pane_menu/pane_menu.php");
	$_pane_menu =  new pane_menu();
	$_pane_menu->onAfterInitialise();
	
	include("plugins/qualification/qualification.php");
	$_qualification =  new qualification();
	$_qualification->onAfterInitialise();
	
	include("plugins/admission/admission.php");
	$_admission =  new admission();
	$_admission->onAfterInitialise();
	
	include("plugins/courses/courses.php");
	$_courses =  new courses();
	$_courses->onAfterInitialise();
	