<?php
require('../config/config.php');
session_start();

$id=$_SESSION['uid'];
$planid=$_SESSION['planid'];
$city=$_POST['city'];
if(isset($city))
{
	$stmt1 = $con->prepare("select * from insertcity where planid=$planid");
	$stmt1->execute();
	$no=$stmt1->rowCount();
	if($no<1)
	{
		$stmt = $con->prepare("INSERT INTO insertcity(cityname,planid) VALUES (:cityname,:planid)");
		$stmt->bindParam(":cityname",$city);
		$stmt->bindParam(":planid",$planid);
		$stmt->execute();
		header('Location:choosedate.php');

	}
	else
	{
		header('Location:choosedate.php');
	}

}
else
{

	header('Location:choosestate.php');
}

?>