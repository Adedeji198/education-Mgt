<?php defined('_JEXEC') or die;
	include dirname(__FILE__).'/test';
	$Articles = getArticles();
?>
<?php	
	include dirname(__FILE__)."/helper.php";
?>
<textarea cols="100" rows="20">
<?php foreach( $Articles AS $Key => $Value) { ?>

<?php 
	$Value["string"] = replaceTextUsing_UserData($Value["string"]);
	echo $Value["string"]; 
?>

<?php } ?>

	global $PDO
	$query = "SELECT * FROM users WHERE id =?";
	$pds = $PDO->prepare($query);
	$pds->execute(array($_SESSION['userid']));

</textarea>
	 