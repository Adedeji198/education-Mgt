<?php
    include "router.php";
?><!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php 
	$R = route($PageName, "title");
	foreach ($R as $key => $value) {
	include($value);
}
?></title>
    <?php 
	$R = route($PageName, "css");
	foreach ($R as $key => $value) {
	include($value);
}
?>
</head>
<body>
 <?php 
	$R = route($PageName, "debug");
	foreach ($R as $key => $value) {
	include($value);
}
 ?>
    <div id="head" >
        <div id="logo" ><img src="pictures/logo.png" /></div >
    </div >
    <?php 
	$R = route($PageName, "menu");
	foreach ($R as $key => $value) {
	include($value);
}
?>
    <div id="body" >
        <div id="left-pane">
        <?php 
        
	$R = route($PageName, "left-pane");
	foreach ($R as $key => $value) {
	include($value);
	
}
/****/
?>
        </div>
    
        <div id="right-pane">
<?php 
	$R = route($PageName, "main");

	foreach ($R as $key => $value) {
	include($value);
}
?>    
 </div>
 <?php if(isset($setRightPane100)): ?>
<script >
	document.getElementById('right-pane').style.width = "89.7%";
</script>
<?php endif;  ?>
    </div >
    <div id="footer" ><?php 
	$R = route($PageName, "footer");
	foreach ($R as $key => $value) {
	include($value);
}
?></div >
<?php 
	$R = route($PageName, "scripts");
	foreach ($R as $key => $value) {
	include($value);
}
?>
</body>
</html>