<?php defined('_JEXEC') or die ?>
 <script src="modules/uplload_files/js/ajaxupload.3.5.js" ></script> 
<h2>File Upload</h2>
<form id="form" method="post" >
<table >
<tbody>
<tr>
<td>Title</td>
<td>
<input name="title" type="text" />

</td>
<td rowspan="2">
	<div id="btn-file-upload" style="border: thin solid #aaa; width: 98px; height: 98px; padding: 1px">
	<img width="98" heigh="98" src="<?php echo SITE_PATH.'/pictures/6196f77c7e23782b5b346abed29c2843.png'; ?>" alt="" id="target" />
	</div>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="Save">
<input type="hidden" name="task" value="article.save-upload">
<input type="hidden" id="file-path"  name="url"  />
</td>
</tr>
</tbody>
</table>
</form>
<script src="modules/uplload_files/js/script.js" ></script>