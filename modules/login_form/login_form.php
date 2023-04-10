<?php
	defined("_JEXEC") OR die;
?>
Login Page
<hr size="5" color="#29166F">
	<form method="post" onsubmit="return validateForm(this)" action= "<?php
	echo convertURL('student-dashboard.html');
	 ?>">
	
	<br><br><br><br><br>
	<table align="center" >
	<tbody>
	<tr>
	<td><input type="text" name="matric" placeholder="Login ID" value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["matric"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td><input type="password" name="password" placeholder="Password" value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["password"];
		}		
	?>"  id="pass-field" />
	<span  id="peek" style="display: inline-block;">
		<img src="pictures/eye.png" width="25" height="10" />	
	</span>
  </td>
	</tr>
	</tbody>
	</table>
	<br><br>
	<table align="center">
	<tr>
	<td>
		<input type="hidden" name="task"  value="user.student-login" />
	</td>
	</tr>
	<tr>
	<td align="center"><input type="submit" value="LOGIN"/></td>
	</tr>
	</table>
	</form>
	<div id="result" style="margin-top: 50px;color: red; font-size: 15px; text-align: center"  >
    <?php 
        if(
            isset($_POST['register.error']) && 
            "1" == $_POST['register.error']
            
        ){
          echo "The login details were incorrect, please try again";
        }
    ?>
</div>
	
<script src="modules/login_form/jscript/validate.js?v=1" ></script> 