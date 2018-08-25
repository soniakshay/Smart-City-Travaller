<?php
require('../config/config.php');

session_start();

$id=$_SESSION['uid'];
$planid=$_SESSION['planid'];
$fromdate=$_POST['sdate'];
$todate=$_POST['edate'];
$stmt = $con->prepare("select * from journydate where planid=$planid");
	
//$days = ((strtotime($todate) - strtotime($fromdate)) / (60 * 60 * 24))+1;
if($fromdate!="" and $todate!="")
{
	$stmt1 = $con->prepare("select * from journydate where planid=$planid");
	$stmt1->execute();
	$no=$stmt1->rowCount();
	if($no<1)
	{
		$stmt = $con->prepare("INSERT INTO journydate (fromdate,todate,planid) VALUES (:fromdate,:todate,:planid)");
		$stmt->bindParam(":fromdate",$fromdate);
		$stmt->bindParam(":todate",$todate);
		$stmt->bindParam(":planid",$planid);
		$stmt->execute();
		
	}
	header('Location:choosehotel_or_place.php');
}
else
{
	header('Location:choosedate.php');
}


?>