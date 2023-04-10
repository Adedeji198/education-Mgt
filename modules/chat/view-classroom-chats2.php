<?php 
if(! defined('_JEXEC') ){

	include "../../admin/forbidden/db_connect.php";
	define('_JEXEC',1);
}
	include dirname(__FILE__).'/model.php';
	$Articles = getArticles();
?>

<h2><?php echo getCourseName($_POST['course-id']); ?> Classroom</h2>
<h4>Lecturer Console</h4>

<div style="border: 3px solid #999">
<textarea id="editor" class="" cols="40" name="" rows="10"></textarea>
<input type="hidden" id="article-url" value="classroom.html" />
<input type="hidden" id="course-id" value="<?php echo $_POST['course-id']; ?>" />
<input type="hidden" id="article-section" value="main" />
<input type="hidden" id="article-category" value="9" />
<input type="hidden" id="article-id" value="" />
Publish Article
<input type="radio" checked="true"  name="publish"  />Yes
<input type="radio" id="publish"    name="publish"/>No
<input type="button" id="submit-article" value="Save" />
<input type="button" id="open-article" value="Open" />
<input type="button" id="delete-article" value="Delete" />
<input type="button" id="new-article" value="New Article" />

<div id="fetched-articles"></div>
</div>
<script src="admin/scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
        tinymce.init({
        selector: "#editor",
        width: "100%",
        height: "200px",
        margin:"20px",
        
        plugins: [
            "link image lists hr anchor pagebreak spellchecker",
            "searchreplace wordcount code fullscreen insertdatetime media nonbreaking ",
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
<?php include "uplload_files.php"; ?>
<?php
	
	$Chats = fetchNotifications();
?>
<input type="hidden" value="<?php echo $_POST['course-id']; ?>" id="course-id" />
<div id="chat-container">
<ul> 
 <?php foreach($Chats as $stuff) { ?>
	<li class="chat-item"  ><?php echo $stuff['string']; ?>
		<span style="float: right; font-size: 10px; display: inline-block;">
			<?php echo $stuff['matric'],$stuff['timestp']; ?>
		</span>
	</li>
 <?php } ?>
 </ul>
 </div>
 <div style="height: 10px"></div>
 <h5>Classroom Chat</h5>
 <div style="width: 50%; float:left" >
  <textarea id="message-text"  cols="40" name="" rows="10"></textarea>
</div>
  <div style="width:49%; border: thin solid gray; min-height: 200px; float:left" id="class-attendance">
  <input type="button" id="btn-clear-attendnce" value="Clear Attendance" />
  <input type="hidden" id="attendance-task" value="clear" />
  <?php
  	$Attd = fetchAttendance();
  ?>
<ul> 
 <?php foreach( $Attd AS $key=>$stuff) { ?>
	<li class="chat-item"><?php echo $stuff['matric']; ?> <small style="display: inline-block; float: right;"><?php echo $stuff['timestmp']; ?></small></li>
 <?php }  ?>
</ul>
</div>
  <br/>
 <input type="button" value=" Send Message " id="send-message" />
 <input type="button" value=" Exit " id="exit" />
 <script src="modules/chat/js/article-mg.js?v=2" ></script> 
 <script src="modules/chat/js/attendance.js?v=2" ></script> 