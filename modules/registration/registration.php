<?php defined('_JEXEC') or die ?>
	<form method="post" action = "<?php echo convertURL('qualification.html') ?>" onsubmit="return validateForm(this)">
	
	<div style="text-align: center;" >REGISTRATION FORM</div>
	<table >
	<tbody>
	<tr>
		<td colspan="2">
			<h4> Personal Information </h4>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Surname</span>
	</td>
	<td><input type="text" name="surname"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["surname"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Other Name(s)</span>
	</td>
	<td><input type="text" name="firstname"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["firstname"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Address</span>
	</td>
	<td><input type="text" name="adddress"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["adddress"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Mobile Number</span>
	</td>
	<td><input type="text" name="phone"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["phone"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">E-Mail</span>
	</td>
	<td><input type="text" name="email"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["email"];
		}		
	?>"/>  </td>
	</tr>	
	<tr>
	<td>
		<span class="re-lbl">Nationality</span>
	</td>
	<td><input type="text" name="nationality"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["nationality"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">State of Origin</span>
	</td>
	<td><input type="text" name="state"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["state"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Local Government</span>
	</td>
	<td><input type="text" name="lga"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["lga"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
		<td colspan="2">
			<h4>Next of Kin </h4>
	</tr>
	<tr>
	<td>
		<span class="re-lbl"> Name </span>
	</td>
	<td><input type="text" name="nok"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["nok"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Mobile Number</span>
	</td>
	<td><input type="text" name="nok_phone"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["nok_phone"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Address</span>
	</td>
	<td><input type="text" name="nok_address"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["nok_address"];
		}		
	?>"/>  </td>
	</tr>
<tr><td colspan="2"><h4>Login Details</h4></td></tr>
	<tr>
	<td>
		<span class="re-lbl">Username</span>
	</td>
	<td><input type="text" name="username"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["username"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Password</span>
	</td>
	<td><input type="password" name="passw"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["passw"];
		}		
	?>"/>  </td>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">Repeat Password</span>
	</td>
	<td><input type="password" name="passw2"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["passw"];
		}		
	?>"/>  </td>
	</tr>

	<tr>
		<td colspan="2">
			<h4>Passport</h4>
	</tr>

	<tr>
	<td>
		<span class="re-lbl">passport</span>
	</td>
	<td>
	<div style="border: thin solid #888; width: 64px; height: 64px">
		<img src="" id="target" style="width: 100%" />
	</div>
	<input type="" name="passport" id="passport-path"  value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["passport"];
		}		
	?>"/> 
	<input type="button" id="btn-pass-upload" value=".." />
	</td>
	</tr>
	<tr>
		<td colspan="2">
			<h4>Signature</h4>
	</tr>
	<tr>
	<td>
		<span class="re-lbl">signature</span>
	</td>
	<td>
	<div style="border: thin solid #888; width: 64px; height: 64px">
		<img src="" id="target2" style="width: 100%" />
	</div>
	<input type="" name="signature" id="sign-img-path" value="<?php
		if(isset( $_POST["register.error"]) && $_POST["register.error"] ==1) {
			echo $_POST["signature"];
		}		
	?>"/>
	<input type="button" id="btn-sign-upload" value=".." />
  </td>
	</tr>
	<tr>
	<td>
		<input type="hidden" name="task" value="user.register" /> 
	</td>
	<td>&nbsp;</td>
	</tr>
	</tbody>
	</table>
	<br />
	<p align="center"> <input type="submit" value="PROCEED REGISTRATION"/> </p>
	</form> <br/>
<script src="js/ajaxupload.3.5.js" ></script>
<script src="modules/registration/js/validate.js?v=2" ></script>
<script src="modules/registration/js/sript.js?v=2" ></script> 
