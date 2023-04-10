<?php 
	defined('_JEXEC') or die;
/**
Array
(
    [debug] => 1
    [p] => search-articles.html
)
*/
	if(
		isset($_GET['debug']) &&
		$_GET['debug'] == "2"
	){
	echo '<script src="/webDML/js/webutils7.js" ></script>';
	}else 	if(
		isset($_GET['debug']) &&
		$_GET['debug'] == "1"
	){
	echo '<script src="/webDML/debug/log_error.js" ></script>';
	
	
	}else 	if(
		isset($_GET['debug']) &&
		$_GET['debug'] == "3"
	){
	echo '<script src="/webDML/debug/log_error.js" ></script>';
	echo '<script src="/webDML/js/webutils7.js" ></script>';
	
	}


 ?>