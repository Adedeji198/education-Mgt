<?php defined('_JEXEC') or die; 
	include dirname(__FILE__)."/model.php";

	$User = fetchUser();
	$stuff= $User[0];
	/*
	
	Array
(
    [id] => 16
    [surname] => Raji
    [firstname] => Rasak
    [adddress] => No 12 Ajao Farm road
    [username] => sunne
    [phone] => 0804453234
    [status] => 1
    [timestp] => 2017-05-25 21:52:12
    [passw] => password
    [privilege] => 1
    [nationality] => Nigerian
    [state] => Oyo
    [lga] => Ibadan
    [nok] => Tola
    [nok_phone] => 080845632556
    [nok_address] => Nigeria
    [passport] => /edu-prj/uploads/aff084e2505bd6f51544262f9d9b8554.png
    [signature] => /edu-prj/uploads/aff084e2505bd6f51544262f9d9b8554.png
    [level] => 100
    [matric] => 
    [clearance] => 
)
Password M
	*/
?>
Password Management
<hr size="10" color="#29166F"> <br>

<p>You Login details are as follows:</p>
<table>
<tbody>
<tr>
<td>Username</td>
<td> &nbsp </td> <td> &nbsp </td>
<td><?php echo $stuff['username']; ?></td>
</tr>
<tr>
<td>Password</td>
<td> &nbsp </td> <td> &nbsp </td>
<td><?php echo $stuff['passw']; ?></td>
</tr>
</tbody>
</table>
<p> </p>
<p>To change the above :</p>
<p> </p>

<form method="post" onsubmit= "return checkForm(event) ">
<table>
<tbody>
<tr>
<td>New Username</td>
<td><input id="" class="" name="username" type="text" /></td>
</tr>
<tr>
<td>New Password</td>
<td><input id="password1" class="" name="password" type="password" /></td>
</tr>
<tr>
<td>Retype Password</td>
<td><input id="password2" class="" name="password2" type="password" /></td>
</tr>
</tbody>
</table> <br>
<input type="hidden" name ="task" value="user.change-password" />
<input type="submit" value=" Change "/>
</form>
<script>
	function checkForm(event){
		var Password1 = document.getElementById("password1"),
		Password2     = document.getElementById("password2");
				Password1.style.border="thin solid #ddd";
				Password2.style.border="thin solid #ddd";
		if( 
			Password1.value != Password2.value ||
			'' == Password2.value
		){
				Password1.style.border="thin solid red";
				Password2.style.border="thin solid red";
				return false;
		}else{
			return true;
		}
		
	}
</script>