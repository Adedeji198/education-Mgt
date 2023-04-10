<?php 
	
	define('_JEXEC', 1);
	session_start();
	
	include "../../admin/forbidden/db_connect.php";
	include dirname(__FILE__).'/model.php';
	
	sendMessage();

?> 