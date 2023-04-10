<?php
if($_POST["task"]== "pane_menu.update"){

	$query = "UPDATE pane_menu SET id = ?, pagename = ?, url = ?, title = ?, privilege = ?
	WHERE id= ? "; 
	$pds = $PDO->prepare($query); 
	
	foreach ($_POST["data"] as $key => $value) {
		# code...

	$pds->execute( array(
	$value[""], 
		$value["page-name"], 
		$value["url"], 
		$value["string"], 
		$value["privilege"], 
		$value["id"]
		) 
	);
	}
} 

if($_POST["task"]== "pane_menu.create"){

	$query = "INSERT INTO pane_menu ( id, pagename, url, title, privilege)
	VALUES( ?, ?, ?, ?, ? )";

	$pds = $PDO->prepare($query); 
	
	$pds->execute( array(
	$_POST[""], 
		$_POST["page-name"], 
		$_POST["url"], 
		$_POST["string"], 
		$_POST["privilege"]
		) 
	);
	
} 

if($_POST["task"]== "pane_menu.update"){
	$IdsStr ="";
	$Counter = 0;

	foreach ($_POST["data"] as $key => $value) {
		# code...
		if($Counter==0){
			$IdsStr .= $value["id"];
			$Counter +=1;
		}else{
			$IdsStr .= ", ". $value["id"];
			$Counter +=1;

		}
	
	}
	
	$query = "DELETE FROM pane_menu
	WHERE id IN($IdsStr) "; 

	$pds = $PDO->prepare($query); 
	

	$pds->execute( array() );
}
