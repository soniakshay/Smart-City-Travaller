<?php
require('../config/config.php');
$planid=$_GET['planid'];
$stmt=$con->query("delete from  plan where id='$planid'");
$stmt->execute();

$stmt=$con->query("delete from  plandetail where planid='$planid'");
$stmt->execute();

$stmt=$con->query("delete from  journydate where planid='$planid'");
$stmt->execute();



$stmt=$con->query("delete from  insertcity where planid='$planid'");
$stmt->execute();


$stmt=$con->query("delete from  holdplace where planid='$planid'");
$stmt->execute();

header('Location:viewplandetail.php');

?>