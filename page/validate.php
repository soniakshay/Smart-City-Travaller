<?php
include('../config/config.php');
session_start();
if(@$_POST['submit'] && $_POST['submit']=="Login")
{
		$uname=$_POST['uname'];
		$pwd=$_POST['pwd'];
		$qry=$con->query("select * from login where uname='$uname' and pwd='$pwd'");
		$f=$qry->fetchAll();
		$no=$qry->rowCount();
		if($no>0)
		{
			foreach($f as $val)
			{
				$_SESSION['uid']=$val['id'];
				header('Location:create_or_view.html');
			}
			
			
		}
		else
		{
				header('Location:index.html');
			
			
		}
		
}
?>

