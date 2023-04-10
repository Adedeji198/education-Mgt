<?php 

	defined('_JEXEC') or die;
?>
<div style="height: 50px "></div>
<h2>Search Articles</h2>
<table border ="0"  >
	<tbody>
	<tr>
		<td style="padding-right: 100px; vertical-align: top;" >
			<?php $Cat =getLevCategory(); ?>
			<ul id="tree-id" >
				<li id="tree-cat-0"  >
					<span >&lt;+></span>
					<span class="cls-item">Uncategorized</span>
				</li>
<?php
	$UnCategorized_Articles = fetch_articles();
?>
<?php foreach($UnCategorized_Articles AS $UArticle ) { ?>
<li>
	<span >
	<strong>	<?php echo $UArticle["title"] ; ?></strong>
	</spanclass="article-title" style="display: inline-block; padding-left: 20px">
		<?php echo substr(strip_tags($UArticle["string"]),0,50)."..." ; ?>
		
		<span >
		<input type="button" class="cls-btn-edit" value="Edit" />
		<input type="hidden" value="	<?php echo $UArticle['id'] ; ?>" />
		</span>	
	<span
</li>
<?php } ?>
				<?php foreach($Cat AS $Value ) { ?>
				<li id="tree-cat-<?php echo  $Value['id']; ?>" class="cls-item" >
					<span class = "cls-plus"></span>
					<span class="cls-item"><?php echo  $Value['name']; ?></span>
				</li>
				<?php } ?>
			</ul>
		</td>
	</tr>
	</tbody>
</table>