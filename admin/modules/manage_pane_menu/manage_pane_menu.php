<?php 
	include dirname(__FILE__)."/model.php";
	include dirname(__FILE__)."/helper.php";	
	$SN = 1;
	$Stuff = fetchMenu ();
		$D = fetchURLs();

		$H = new DropdownCreator();
		$H ->setName("page-name");
		$H ->setValue("");
		$H ->setDataArray($D);
		$H ->setValuekey("string");
		$H ->setTextkey("string");

		$D = fetchURLs();

		$U = new DropdownCreator();
		$U ->setName("url");
		$U ->setValue("");
		$U ->setDataArray($D);
		$U ->setValuekey("string");
		$U ->setTextkey("string");
		
?>	
<h2>Manage menu</h2>
<h4>Create :</h4>
<form method="post" >
	<table>
	<tbody>
		<tr>
			<td title="The page where menu is found">Page Name</td>
			<td><?php
				echo $H->getDropdownstring();	?>
					
			</td>
		</tr>
		<tr>
			<td title="page where menu-item link directs to">URL</td>
			<td><?php
				echo $U->getDropdownstring();  ?>
			</td>
		</tr>
		<tr>
			<td>Text</td>
			<td>
				<input type="text" name="string" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td  >
				<br /><br />
				<input type="submit" class="btn btn-primary" value="  Create  " style="width: 100%" />
			</td>
		</tr>
	</tbody>
	</table>
	<input type="hidden" name="task" value="pane_menu.create" />
</form>
<br />
<hr />
<div id="menu-list-container" style="max-height: 500px; overflow-y: scroll; width: 90%; border-bottom: thin solid #ccc; margin-bottom: 10px" >
	<table class="table"  border="0" id="pane-menu-table">
	<tbody>
		<tr>
			<td>S/N</td>
			<td>&nbsp;</td>
			<td>Page Name</td>
			<td>URL</td>
			<td>Text</td>
		</tr>

		<?php foreach( $Stuff  AS $Key=> $stuff ) : ?>
		<tr ondrop="drop(this)" draggable="true" class="menu-item-row">
			<td><?php echo ($SN++); ?></td>
			<td  >
				<input type="checkbox" class="chk-menu" value = "<?php  echo $stuff['id']; ?>"/>
			</td>
			<td><?php
				$H -> setValue($stuff["pagename"]);
				echo $H->getDropdownstring();	?>
			</td>
			<td><?php
				$U -> setValue($stuff["url"]);
				echo $U->getDropdownstring();	?>
			</td>
			<td>
				<input type="text" name="string" value="<?php echo $stuff["title"]; ?>" />
			</td>
		</tr>
		<?php endforeach;  ?>
	</tbody>
	</table>
</div>
<div style="float:right; clear:both; margin-right: 10%">
	<input type="button" value="Delete Selected" class="btn btn-warning" id="btn-delete" />
</div>
<script src = "modules/manage_pane_menu/js/script.js?v=3" ></script>