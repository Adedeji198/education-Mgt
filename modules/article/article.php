<!--<script src="/webDML/debug/log_error.js" ></script>-->
<?php 
defined('_JEXEC') or die;
include dirname(__FILE__)."/model.php";
include dirname(__FILE__)."/view-search.php";
include dirname(__FILE__)."/model1.php";
include dirname(__FILE__)."/helper.php";

?>

<script src="scripts/tinymce/tinymce.js"></script>
<script type="text/javascript">
        tinymce.init({
        selector: "#text_editor",
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



<h2>Edit Article</h2>
<?php 
//pretty_r($_POST); die;  
?>
<strong>Title : </strong><span class="title-box" ></span>
<form method="post" >
	<textarea id="text_editor" name="article_text"></textarea>
	<table>
		<tr>
			<td><input type="submit" value=" Save " /></td>
			<td><input id="cancel-button" type="button" value=" Cancel " /></td>
			<td>
			<input id="new-article" type="button" value="New"/>
			</td>
		</tr>
		<tr>
		<td colspan="3">
			<input type="hidden" name="task" value="article.save"/>
			<input type="text" name="article-title" id = "article-title" placeholder="Article Title"/>
			<input type = "hidden" id="article-id" name="article-id"  />
		</tr>
	</table>
<?php

	$Cat     = getCategories();
	//$Article = getArticle();
 	$KK = new DropdownCreator();
//setClass
	$KK->setID("article-category");
	$KK->setName("category");
	$KK->setValue("");
	$KK->setDataArray($Cat);	
	$KK->setValuekey("id");
	$KK->setTextkey("name");
	echo $KK->getDropdownstring();
	/*****/
	$URLs     = getURLs();
	//$Article = getArticle();
 	$KK = new DropdownCreator();
//setClass
	$KK->setID("article-URL");
	$KK->setName("article-url");
	$KK->setValue("");
	$KK->setDataArray($URLs);	
	$KK->setValuekey("id");
	$KK->setTextkey("string");
	echo $KK->getDropdownstring();
	/*****/

	$Sections = getSections();
	//$Article = getArticle();
 	$KK = new DropdownCreator();
//setClass
	$KK->setID("article-section");
	$KK->setName("section");
	$KK->setValue("");
	$KK->setDataArray($Sections);	
	$KK->setValuekey("id");
	$KK->setTextkey("string");
	echo $KK->getDropdownstring();
	/*****/	
?>
<input type="hidden" name = "task" value="article.save"/>
</form>
<!--<script src="extractor.js" > </script> -->
<script type="text/javascript" src="modules/article/js/script2.js?t=7"></script>