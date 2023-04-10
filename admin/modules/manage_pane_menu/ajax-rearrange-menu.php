<?php
include __DIR__."/../../forbidden/db_connect.php";
include __DIR__."/model.php";

foreach ($_REQUEST['new-ids'] as $key=> $menu_id) {
	# code...
	$new_position = $key+1;
	changeMenuPosition($menu_id,$new_position);
}

 