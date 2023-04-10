<?php
	
	if(is_dir("../../admin") ){
		include('../../admin/forbidden/db_connect.php');
	}else{
		include('../../forbidden/db_connect.php');
	}


	$clean_name = getFileName($_FILES['userfile']['name']);
	$extension  = getExtension($_FILES['userfile']['name']);
	
	$clean_name = str_replace(' ', '-', $clean_name);
	$clean_name = md5($clean_name.time());
	

	$new_name   = SITE_FOLDER.'/file-uploads/'.$clean_name.".".$extension;

	error_reporting(0);
	
	move_uploaded_file(
		$_FILES['userfile']['tmp_name'], 
		$new_name	
	);

	
	
	echo json_encode(SITE_PATH."/file-uploads/".$clean_name.".".$extension);

	function getExtension($name){
		$nameArr = explode(".", basename($name));
		return strtolower( $nameArr[1]);
	}

	function getFileName($name){
		$nameArr = explode(".", basename($name));
		return $nameArr[0];
	}
/*
function objToArray($Obj){
	$ret = array();
	foreach($Obj AS $Key=> $Value){
		if(gettype($Value)	=="object"){
			$ret[$Key]= objToArray($Value);
		}else{
			$ret[$Key]= $Value;
		}
	}//end foreach
	
	return $ret;
}
*/