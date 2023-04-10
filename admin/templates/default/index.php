<!DOCTYPE html>
<?php include "router.php" ; ?>
<html lang="en-gb" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Joomla! - Open Source Content Management">
	<title>Administration</title>
	<?php 
    $Inc = route($PageName, "css");
    foreach ($Inc AS $value) { include($value); }
	?>	
</head>
<body class="page-header-fixed" data-basepath="" style="">
	<?php 
    $Inc = route($PageName, "debug");
    foreach ($Inc AS $value) { include($value); }
	?>

<!-- Top Nav bar  -->

<!-- Header -->
	<header class="header">
	<?php 
    $Inc = route($PageName, "top_navbar");
    foreach ($Inc AS $value) { include($value); }
	?>
	</header>
	<!-- Subheader -->
	<a class="btn btn-subhead" data-toggle="collapse" data-target=".subhead-collapse">Toolbar		<span class="icon-wrench"></span></a>
	<div class="subhead-collapse collapse" id="isisJsData" data-tmpl-sticky="true" data-tmpl-offset="30" style="height: 0px;">
		<div class="subhead subhead-fixed">
			<div class="container-fluid">
				<div id="container-collapse" class="container-collapse"></div>
				<div class="row-fluid">
					<div class="span12">
						<div class="btn-toolbar" id="toolbar">
</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<!-- container-fluid -->
<div class="container-main" style="top: 47px;">
	<section id="content">
		<!-- Begin Content -->
		
		<div class="row-fluid">
							<div class="span12">
										<div id="system-message-container">
	</div>

					

	<div class="header navbar navbar-fixed-top visible-phone">
	<div class="header-inner">

		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="pictures/menu-toggler.png" alt="">
		</a>
		</div>
		</div>
		
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php 
    $Inc = route($PageName, "menu");
    foreach ($Inc AS $value) { include($value); }
	?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
	<?php 
    $Inc = route($PageName, "crumbs");
    foreach ($Inc AS $value) { include($value); }
	?>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->


</script>
<script type="text/javascript"> 
</script>
<?php
   $Inc = route($PageName, "main-content");
   /*
   echo $PageName;
   pretty_r($Inc); die;

   /****/
    foreach ($Inc AS $value) { include($value); }
	
?>			
			<div class="clearfix">
			</div>
			<div class="row">
				
				<div class="col-md-6 col-sm-6">
				
				
				</div>
			</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<?php
   $Inc = route($PageName, "footer");
    foreach ($Inc AS $value) { include($value); }
?>
<!-- END FOOTER -->



	
				</div>
			</div>
						<!-- End Content -->
	</div></section>

	</div>
	
	<!-- Begin Status Module -->
<?php
   $Inc = route($PageName, "status_module");
    foreach ($Inc AS $value) { include($value); }
?>
	<!-- End Status Module -->



</body></html>