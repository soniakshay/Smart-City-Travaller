<?php
		require('../config/config.php');

		$placename=$_GET['placename'];
		$planid=$_GET['planid'];
		
		$stmt = $con->prepare("INSERT INTO plandetail (placename,planid) VALUES (:placename,:planid)");
		$stmt->bindParam(":placename",$placename);
		$stmt->bindParam(":planid",$planid);
		$stmt->execute();
?>