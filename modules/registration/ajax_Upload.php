<?php
	
	if(is_dir("../../admin") ){
		include('../../admin/forbidden/db_connect.php');
	}else{
		include('../../forbidden/db_connect.php');
	}

	$clean_name = getFileName($_FILES['userfile']['name']);	
	//$clean_name = str_replace(' ', '-', $clean_name);
	$clean_name = md5($clean_name.$_FILES['userfile']['tmp_name'].time());
	
	$ext = getExtension($_FILES['userfile']['name']);
	
	$new_name   = SITE_FOLDER.'/uploads/'.$clean_name;
	$new_name   = str_replace("\\", "/", $new_name).".$ext";

	error_reporting(0);
	
	move_uploaded_file(
		$_FILES['userfile']['tmp_name'], 
		$new_name	
	);

	$URL = str_replace("\\", "/", SITE_PATH."/uploads/".$clean_name.".".$ext);
	echo json_encode($URL);

	function getExtension($name){
		$nameArr = explode(".", basename($name));
		return $nameArr[1];
	}

	function getFileName($name){
		$nameArr = explode(".", basename($name));
		return $nameArr[0];
	}
?>