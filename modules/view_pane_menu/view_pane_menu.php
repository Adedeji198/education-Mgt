<?php 
		defined('_JEXEC') OR die();
		include dirname(__FILE__)."/model.php";
		$Stuff = fetchPanemenu($PageName);
?>
<?php if(sizeof($Stuff) == 0): ?>
<script >
	$("#left-pane").hide();
</script>
<?php $setRightPane100 = 1; ?>
<?php endif;  ?>
<div class="title"><?php
	if("enroll.html" ==$PageName){
		echo "Application";
	}else if("candidate-login.html" == $PageName){
		echo "Application";
	}else if("registration.html" == $PageName){
		echo "Application";
	}else if("index.php" == $PageName){
		echo "";
	}else if("user-dashboard.html"==$PageName){
		echo "Applicant Dashboard";
	}else{
		echo "Student Dashboard";
	}
	
?></div>

<ul> 
	<?php foreach($Stuff AS $Key=>$stuff ){ ?>
	<li  >
		<a <?php
	if(getCurrentUrl() == $stuff["url"]){
		echo ' class="current-pm-item" ';
	}
	 ?> href="<?php echo convertURL($stuff["url"]); ?>">
			<?php echo $stuff["title"]; ?>
		</a>
	</li>
 	<?php  }  ?>
</ul>
