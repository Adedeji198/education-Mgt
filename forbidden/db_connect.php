<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if('/admin'==substr($uri, 0,6)){
/*	echo '<base href="/admin/index.php">';
	include __DIR__."/../admin/index.php";
	die;
*/	header("Location: /admin/index.php?p=$uri");
}else{
	include __DIR__."/../admin/forbidden/db_connect.php";
}

?>