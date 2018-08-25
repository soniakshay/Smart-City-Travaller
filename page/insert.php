<?php
require('../config/config.php');
session_start();

$id=$_SESSION['uid'];
$planname=$_POST['planname'];
$dis=$_POST['dis'];

$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$startpoint=$_POST['startpoint'];
$stmt = $con->prepare("INSERT INTO plan (planname,user_id,sdate,edate,dis,startingpoint) VALUES (:planname,:id,:sdate,:edate,:dis,:startpoint)");
$stmt->bindParam(":planname",$planname);
$stmt->bindParam(":id",$id);
$stmt->bindParam(":sdate",$sdate);
$stmt->bindParam(":edate",$edate);
$stmt->bindParam(":dis",$dis);
$stmt->bindParam(":startpoint",$startpoint);

$stmt->execute();
header('Location:dashbord.html');
?>