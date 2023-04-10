<?php defined('_JEXEC') or die ?>
Applicant Login Page
<hr size="5" color="#29166F">
<form method="post"  onsubmit="return validateForm(this)">
	<br><br><br><br><br>
	<table align="center">
	<tbody>
	<tr>
	<td><input type="text" name="username" placeholder="Username" value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["username"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td><input type="password" name="password"  id="password" placeholder="Password" value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["password"];
		}		
	?>"/>
	<div id="peek" style="float: right" >
	<img src="pictures/eye.png" width="25" height="10"  />
	</div>
	</td>
	</tr>
	<tr>
	<td>
		<input type="hidden" name="task" value="user.login" /> 
	</td>
	</tr>
	<tr>
	<td align="center"><input type="submit" value="LOGIN"/></td>
	</tr>
	</tbody>
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
	<script src="modules/appl_login_form/jscript/validate.js?v=2"></script>
