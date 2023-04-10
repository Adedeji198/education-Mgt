<?php
function getCourses(){
	global $PDO; 
	$query = "SELECT * FROM courses  WHERE 1  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}

function fetchMyCourses($UserId){
	global $PDO; 
	$query = "SELECT user, course FROM user_courses WHERE user= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($UserId) );
	return $pds->fetchAll(2);
}

function fetchusers(){
	global $PDO; 
	$query = "SELECT * FROM users  WHERE privilege ='2'  ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}

function fetchSingleUser($userid){
	global $PDO; 
	$query = "SELECT * FROM users WHERE id= ? ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array($userid) );
	
	return $pds->fetchAll(2);
	
}
