<?php 
defined('_JEXEC') or die;
if(!isset($_SESSION)){
	session_start()	;
	include dirname(__FILE__)."/model.php";
}
?>

<div id="message-div2" style="min-height: 200px; max-height: 300px;  overflow: hidden;">
<?php $Chats =  fetchChats(); ?>

<ul> 
 <?php  foreach($Chats AS $Key=>$stuff ) { ?>
	<li><span><?php echo $stuff["string"]; ?></span></li>
 <?php  }  ?>
</ul>

</div>
<textarea id="message-text" class="txt" cols="45" name="message-text" rows="7"></textarea>
<div>
<input id="btn-send-message"  type="button" value="  Send  " />
<input id="btn-back"  type="button" value="   Back   " />
<input id="sender-id" type="hidden" value="<?php echo $_POST["user-id"]; ?>" /> 
</div>

/////////view message 2
<?php 
defined('_JEXEC') or die;
if(!isset($_SESSION)){
	session_start()	;
	include dirname(__FILE__)."/model.php";
}
?>

<div id="message-div2" style="min-height: 200px; max-height: 300px;  overflow: hidden;">
<?php $Chats =  fetchChats(); ?>

<ul> 
 <?php  foreach($Chats AS $Key=>$stuff ) { ?>
	<li><span><?php echo $stuff["string"]; ?></span></li>
 <?php  }  ?>
</ul>

</div>
<textarea id="message-text" class="txt" cols="45" name="message-text" rows="7"></textarea>
<div>
<script src="admin/scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
        tinymce.init({
        selector: "#message-text",
        width: "80%",
        height: "200px",
        margin:"20px",
        
        plugins: [
            "link image lists hr anchor pagebreak spellchecker",
            "searchreplace wordcount code fullscreen insertdatetime media nonbreaking dynamic_text",
            "save table contextmenu directionality emoticons template textcolor paste textcolor colorpicker "
        ],
		toolbar: " undo redo | styleselect bullist numlist | bold italic | link image dynamic_text ",
		relative_urls : false,
		remove_script_host: true,
		document_base_url : "<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.SITE_PATH;  ?>",
        style_formats: [
            {title: 'Dynamic Text', inline: 'span', classes:'dynamic-text' },
            {title: 'Heading 1', block: 'h1'},
            {title: 'Heading 2', block: 'h2'},
            {title: 'Heading 3', block: 'h3'},
        ],
        content_css : "<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.SITE_PATH.'/css/style.css'; ?> ",
        image_list: 
        function(successFunction) {
            $.ajax(
                {
                    url: "<?php echo SITE_PATH."/ajax_fetchImage.php"; ?>",
                    success:function(dat){
                        successFunction(eval('('+dat+')'));
                    },
                    type: "post"
                }
            );  
        },
        link_list: 
        function(successFunction) {
            $.ajax(
                {
                    url: "<?php echo SITE_PATH."/ajax_fetchFile.php"; ?>",
                    success:function(dat){
                    	console.log(dat);
                        successFunction(eval('('+dat+')'));
                    },
                    type: "post"
                }
            );  
        }
    });

</script>

<input id="btn-send-message"  type="button" value="  Send  " />
<input id="btn-back"  type="button" value="   Back   " />
<input id="sender-id" type="hidden" value="<?php echo $_POST["user-id"]; ?>" /> 
</div>
