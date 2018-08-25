<?php
$hostname="localhost";
$uname="root";
$pwd="";
$con=new PDO('mysql:host=localhost;dbname=smart_city_travaller', $uname, $pwd);
if(!$con)
{
	echo "Error";
}
?>