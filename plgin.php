<?php
	defined("_JEXEC") or die;
	
		
	
	include("plugins/login/login.php");
	$_login =  new login();
	$_login->onAfterInitialise();
	
	include("plugins/protect_page/protect_page.php");
	$_protect_page =  new protect_page();
	$_protect_page->onAfterInitialise();
	
	include("plugins/user/user.php");
	$_user =  new user();
	$_user->onAfterInitialise();
	
	include("plugins/qualification/qualification.php");
	$_qualification =  new qualification();
	$_qualification->onAfterInitialise();
	
	include("plugins/course/course.php");
	$_course =  new course();
	$_course->onAfterInitialise();
	
	include("plugins/upload/upload.php");
	$_upload =  new upload();
	$_upload->onAfterInitialise();
	