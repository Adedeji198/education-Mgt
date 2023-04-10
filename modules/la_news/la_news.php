News & Information
<hr size="10" color="#29166F"> <br>

<?php defined('_JEXEC') or die;
	include dirname(__FILE__).'/model.php';
	$Articles = getArticles();
?>
Hello
<?php foreach( $Articles AS $Key => $Value) { ?>
	<article class="view-article">
	<span class="title"><?php echo $Value['title'] ?></span>
<?php echo $Value['string']; ?>
	</article>
<?php } 