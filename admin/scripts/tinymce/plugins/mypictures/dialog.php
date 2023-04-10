<?php 
	if(!isset($_SERVER['REQUEST_SCHEME'])){
		$_SERVER['REQUEST_SCHEME'] = 'http';
	}

	if(!isset($_SERVER['DOCUMENT_ROOT'])){
		$_SERVER['DOCUMENT_ROOT'] = '/storage/sdcard0/paw/html';
	}
?><!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div.img-box{
			width: 24%;
			display: block;
			float: left;
			border: thin solid #999;
			margin-left: 0.5%;
			margin-right: 0.5%;
			margin-top: 3px;
			margin-bottom: 3px;
			height: 200px;
			overflow-y: hidden;
			cursor: pointer;
		}

		div#img-container{
			border: thin solid #999;
			margin: 3px;
		}

		div.img-box img{
			max-width: 100%;
			display: block;
			margin: auto;
			/*margin-right: auto;*/

		}
	</style>
</head>
<body>

<div id="img-container" >

<?php $Pictures = getPictures(); ?>
<?php foreach ($Pictures as $key => $picture) {  ?>
<div class="img-box" >
<?php if($_SERVER['DOCUMENT_ROOT'] !='/'){ ?>
<img  src="/talented/downloads/<?php echo $picture ?>" />
<?php }else{ ?>
<img  src="/downloads/<?php echo $picture ?>" />
<?php } ?>
</div>
<?php } ?>
</div>
<div>
<input type="hidden" id="picture" />
</div>
<script >
	imgs = document.getElementsByClassName("img-box");
	for(var x in imgs){
		imgs[x].addEventListener('click',setVal);
	}

	function setVal(){
		document.getElementById('picture').value =
		this.getElementsByTagName('img')[0].src;
	}
</script>
</body>
</html><?php



	function getPictures(){
		
		$Files =scandir($_SERVER['DOCUMENT_ROOT'].'/talented/downloads');	
		$Pictures = array();

		foreach($Files AS $File){
		 	if(isImage($File)){
		 		$Pictures[] = $File;
		 	}
		}

		return $Pictures;
	}
	
	function isImage($FileName){
		return in_array(
			getExtension($FileName), 
			array(
				'png',
				'jpg',
				'gif',
				'jpeg'
				)    
		);
		
	}

	function getExtension($name){
		$nameArr = explode(".", basename($name));
		
		return strtolower($nameArr[1]);
	}
?>