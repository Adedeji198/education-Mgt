<?php 
	defined("_JEXEC") OR die;

	include dirname(__FILE__)."/model.php";
	include dirname(__FILE__)."/helper.php";

	$Level_Stuff =
	array(
		array( "value"=>"1","text"=>"level 1"),
		array( "value"=>"2","text"=>"level 2"),
		array( "value"=>"3","text"=>"level 3"),
		array( "value"=>"4","text"=>"level 4")
	);

	$Level_Dropdown = new DropdownCreator();
	$Level_Dropdown->setDataArray($Level_Stuff);
	$Level_Dropdown->setName("level");
	$Level_Dropdown->setValuekey("value") ;
	$Level_Dropdown->setTextkey("text");


	$Stuff = fetchCategories ();

	$Parents = new DropdownCreator();
	$Parents->setName("parent");
	$Parents->setValuekey("id") ;
	$Parents->setTextkey("name"); 
	$SN = 1;
?>
	<table class="table"  border="0" id="category-table">
	<tbody>
	<tr>
		<td>S/N</td>
		<td>&nbsp;</td>
		<td>Name</td>
		<td>Parent</td>
		<td>Level</td>
		</tr>
	<?php foreach( $Stuff  AS $Key=> $stuff ) { ?>
		<tr >
			<td><?php echo ($SN++); ?></td>
			<td><input type="checkbox" class="cls-chk-cat" value = "<?php echo $stuff["id"]; ?>" /> </td>		
		<td>
			<input type="text" name="name" value ="<?php echo $stuff["name"]; ?>" />
		</td>
		
		<td>
			<?php
				$Parents-> setDataArray(
					extractLevel(
						$Stuff,
						intVal($stuff['levl'])
					) 
				);
				$Parents->setValue($stuff["parent"]);
 				echo $Parents->getDropdownstring();
			?>
		</td>		
		<td>
			<?php 
				$Level_Dropdown->setValue($stuff["levl"]);
				echo $Level_Dropdown->getDropdownstring();
			?>
		</td>
			</tr>
<?php }  ?>
</tbody>
</table>
<div style="padding-top: 10px; padding-bottom: 50px">
<input type="button" value="Update" id="btn-update" />
<input type="button" value="Delete" id="btn-delete" />
</div>

<h3>Create New Category</h3>
<form method="post">
<table>
	<tbody>
	<tr>
		<td>Name</td>	
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<td>Level</td>	
		<td>
		<?php 
			$Level_Dropdown->setValue("");
			echo $Level_Dropdown->getDropdownstring();
		?>
		</td>
	</tr>
		<tr><td>&nbsp;</td>
		<td><input type="submit" value="  Create  " /></td>
	</tr>
</tbody>
</table>
<input type="hidden" value="article.create-category" name="task" />
</form>

<script src = "modules/categories/js/script.js" ></script>
