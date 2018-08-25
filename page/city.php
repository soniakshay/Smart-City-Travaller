<?php
require('../config/config.php');
session_start();

$state=$_GET['state'];
$stmt = $con->query("select * from city where state='$state'");
$t=$stmt->fetchAll();
?>

		<h4 style="color:white;">Choose State</h4>
			<div class="table-responsive" style="background:white;padding:10px;overflow-y:hidden;">          
				<table class="table">
		
<?php
foreach($t as $val)
{

?>
		<tr>
			<td><input type="radio" name="city" id="city" value="<?php  echo $val["city"] ?>"><?php  echo $val["city"] ?></td>
		</tr>
<?php
}
?>
			</table>
	

 
