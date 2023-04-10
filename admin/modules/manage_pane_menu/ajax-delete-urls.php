<?php 
	include "../../forbidden/db_connect.php";
	include __DIR__."/model.php";



	foreach ($_POST['url-ids'] as $key => $value) {
		deleteURL($value);
	}

	echo json_encode($_POST);