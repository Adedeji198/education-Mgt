<?php defined('_JEXEC') or die ;
	include dirname(__FILE__).'/model.php';
	$users = fetchUser();
	$users = $users[0];
?>
Applicant Main Menu
<hr size="10" color="#29166F">
<p>Click on the link at the left-hand side to continue</p>
<h3> Welcome <?php echo $users["surname"]; echo ", &nbsp;&nbsp;".$users["firstname"];?> </h3>