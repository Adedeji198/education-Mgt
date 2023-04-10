Admission Status
<hr size="5" color="#29166F"> <br>

<?php defined('_JEXEC') or die;

	include dirname(__FILE__)."/model.php";
	$Me = fetchUser();

	$Admitted = ($Me[0]['level'] != 0);
	if(!$Admitted){
		echo "Sorry!!! You have not yet been offered provisional admission. Please, check back later.";
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

Congratulations!!! <br/> <br>
You've been offered provisional admission. See details of your admission below and proceed to making payment. <br> <br>
<table border="0" align="center">
                    <tr>
                        <td> Level </td>
                        <td> &nbsp </td> <td> &nbsp </td>
                        <td> 400 </td>
                    </tr>
                    <tr>
                        <td> Programme Course </td>
                        <td> &nbsp </td> <td> &nbsp </td>
                        <td> <b> B. Sc. Computer Science </b> </td>
                    </tr>
                    <tr>
                        <td> Department </td>
                        <td> &nbsp </td> <td> &nbsp </td>
                        <td> Computer Science </td>
                    </tr>
                    <tr>
                        <td> Faculty </td>
                        <td> &nbsp </td> <td> &nbsp </td>
                        <td> Communication & Information Sciences </td>
                    </tr>
                </table> <br>
After making payment, keep checking for your clearance status, (that is the confirmation of your payment). Your admission is only confirmed after you have been cleared. Payment details is as follows: <br>
<br>
<div id="Body">
<div id="Page-Content">
<table border="0" align="center">
<tbody>
<tr>
<td>Bank</td>
<td> &nbsp </td> <td> &nbsp </td>
<td>Guarranty Trust Bank (GTBank)</td>
</tr>
<tr>
<td>Account Name</td>
<td> &nbsp </td> <td> &nbsp </td>
<td>Afolabi Victor</td>
</tr>
<tr>
<td>Account Number</td>
<td> &nbsp </td> <td> &nbsp </td>
<td>0131589192</td>
</tr>
<tr>
<td>Amount</td>
<td> &nbsp </td> <td> &nbsp </td>
<td>#100, 000</td>
</tr>
</tbody>
</table>
</div>
</div>
<p>&nbsp;</p>
<?php
}
?>