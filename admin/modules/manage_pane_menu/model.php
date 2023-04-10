<?php

function fetchMenu(){
	global $PDO; 
	$query = "SELECT * FROM pane_menu  WHERE 1 ORDER BY position ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 
	return $pds->fetchAll(2);
}

function fetchURLs(){
	global $PDO; 
	$query = "SELECT * FROM url WHERE 1 ";
	$pds = $PDO->prepare($query); 
	$pds->execute( array() ); 	
	return $pds->fetchAll(2);
}

function deleteURL($UrlId){
	global $PDO;

	$query = "DELETE FROM pane_menu WHERE id= ? ";
	$pds = $PDO->prepare($query); 
	
	/****showPrepedQuery($query,
	/****/$pds->execute(/****/ 
		array($UrlId )
	); 
}

function changeMenuPosition($menu_id,$new_position){
	global $PDO; 

	$query = "UPDATE pane_menu 	SET position= ? 
	WHERE id= ? "; 

	$pds = $PDO->prepare($query); 
	/****/showPrepedQuery($query,
	/****$pds->execute(/****/ 
		array(
			$new_position,
			$menu_id
		) 
	); 
}