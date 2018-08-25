<?php
require('../config/config.php');
session_start();
$id=$_SESSION['uid'];
$planname=$_POST['planname'];
if($planname!="")
{
	$qry=$con->query("select * from plan where planname='$planname' ");
	$no=$qry->rowCount();
	
	if($no<1)
	{
		$_SESSION['planname']=$planname;
		$stmt = $con->prepare("INSERT INTO plan (uid,planname) VALUES (:uid,:planname)");
		$stmt->bindParam(":uid",$id);
		$stmt->bindParam(":planname",$planname);
		$stmt->execute();
		$planname=$_SESSION['planname'];
		
		$qry=$con->query("select * from plan where planname='$planname' and uid='$id'");
		$t=$qry->fetchAll();
		foreach($t as $val)		
		{	
			$planid=$val['id'];
		}		
		$_SESSION['planid']=$planid;
		header('Location:choosestate.php');
	}
	else{
		header('Location:create_or_view.html?status=exist');

	}
}
else
{
		header('Location:create_or_view.html');
}

?>