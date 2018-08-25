<?php
require('../config/config.php');
session_start();

$id=$_SESSION['uid'];
$stmt = $con->query("select * from plan where user_id='$id'");
$t=$stmt->fetchAll();

foreach($t as $val)
{
?>

	<div class="row"  style="margin-top:10px;,margin-bottom:10px;padding-left:20px;background:white;">
			
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
			<h3><b>Place:</b><span><?php echo $val["Planname"]; ?></span></h3>
			<p><b>Discription:</b><span><?php echo $val["dis"]; ?></p>
			<p><b>Journy Date:</b><span><?php echo $val["sdate"]; ?></span> To <span><?php echo $val["edate"]; ?></p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<button class="btn btn-info" style="margin-top:50px;">View</button>
		</div>
	</div>
	</div>
<?php
}
?>