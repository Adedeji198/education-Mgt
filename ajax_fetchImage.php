<?php	
	include "admin/forbidden/db_connect.php";

	$Ret = array();
	
	$Files = fetchFiles();
	
	foreach ($Files as $key => $value) {
		if(is_Image($value['value'])){
			array_push($Ret,$value);
		}
	}
	
	echo json_encode($Ret);
	function is_Image($filename){
		$ext = getExtension($filename);

		switch ($ext){
			case "tif":
			case "tiff":
			case "gif":
			case "jpeg":
			case "jpg":
			case "jif":
			case "jfif":
			case "jp2":
			case "jpx":
			case "j2k":
			case "j2c":
			case "fpx":
			case "pcd":
			case "png": return true;
			default: return false;
		}
	}
 
 
	function getExtension($name){
		$nameArr = explode(".", basename($name));
		return strtolower( $nameArr[1]);
	}

	function fetchFiles(){
		global $PDO; 
		$query = "SELECT title, url AS value FROM file_upload WHERE 1 ";
		$pds = $PDO->prepare($query); 
		
		$pds->execute( array() ); 	

		return $pds->fetchAll(2);
	}