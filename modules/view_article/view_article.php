<?php defined('_JEXEC') or die;
	include_once dirname(__FILE__).'/model.php';
	$Articles = getArticles();
?>

<?php foreach( $Articles AS $Key => $Value) { ?>
	<article class="article">
	<div class="title"><?php echo $Value['title'] ?></div>
	<div class="article" >
		<?php echo $Value['string']; ?>
	</div>
	</article>
<?php } ?>