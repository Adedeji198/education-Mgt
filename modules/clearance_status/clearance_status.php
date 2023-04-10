Clearance Status
<hr size="5" color="#29166F"> <br>
<?php defined('_JEXEC') or die;

	include dirname(__FILE__)."/model.php";
	$Me = fetchUser();

	$Cleared = (
		$Me[0]['clearance'] != 0 &&
		$Me[0]['clearance'] != '0' &&
		trim($Me[0]['clearance']) != ''
	);
	if(!$Cleared){
		echo "Sorry!!! You have not yet been cleared. Please, check back later.";
	}else{

	/*
	Array
(
    [0] => Array
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
	*/

?>

Congratulations!! <br>
You have been cleared to study B. Sc. Computer Science in the <b> Department of Computer Science </b> <br><br>
Click on LOGIN at the menu bar and proceed with your registration as a student. <br><br>
Your login details are as follows: <br><br>
<table>
<tr>
<td>Matric Number</td>
<td>&nbsp</td> <td> &nbsp </td>
<td><?php echo $Me[0]['matric']; ?></td>
</tr>
<tr>
<td>Password</td>
<td>&nbsp</td> <td>&nbsp</td>
<td><?php echo $Me[0]['passw']; ?></td>
</tr>
</table>
<?php
}
?>