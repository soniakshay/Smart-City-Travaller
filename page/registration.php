<!DOCTYPE html>
<?php
require_once('../config/config.php');
?>
<html lang="en">
<head>
	<title>Smart City Travaller</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/animate.css">
	<script src="../js/wow.min.js"></script>
	<script>
			  wow = new WOW(
                      {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       true,       // default
                      live:         true        // default
                    }
                    )
                    wow.init();
              new WOW().init();
	</script>

<style>
html,body{
margin:0px;
padding:0px;
background-position:center;
background:url('../image/bg.jpg');
height:100%;
width:100%;
background-attachment:fixed;
background-size:100% 100%;
}
#form{
background:white;
border:1px solid #FF9900;
box-shadow:0px 0px 50px 0px #FF9900;
padding:10px;
margin-top:5%;
}
#submit
{
background:#FF9900;
color:white;
padding:10px;
}

@media screen and (max-width: 900px) {
    
html,body{
background-size:cover;
}
#form{
margin-top:20%;
}
}

</style>
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="form">
		<h1>Login</h1>
		<br/>
			<form method="post" action="registration.php">
				<label for="fname">First Name:</label>
				<br/>
				<input type="text" class="myctrl form-control" placeholder="First Name" id="fname" name="fname">
				<br/>
				
				<label for="lname"  >Last Name:</label>
				<br/>
				<input type="text" class="myctrl form-control" placeholder="Last Name" id="lname" name="lname">
				<br/>
				
				<label for="email"  >Email:</label>
				<br/>
				<input type="email" class="myctrl form-control" placeholder="Email" id="email" name="email">
				<br/>
				
				
				<label for="mno"  >Mobile No:</label>
				<br/>
				<input type="text" class="myctrl form-control" placeholder="Mobile No" id="mno" name="mno">
				<br/>
				
				<label for="uname">UserName:</label>
				<br/>
				<input type="text" class="myctrl form-control" placeholder="UserName"id="uname" name="uname">
				<br/>
				
				<label for="pwd"  >Password:</label>
				<br/>
				<input type="text"class="myctrl form-control" id=" pwd"  placeholder="Password" name="pwd">
				<br/>
				
				<input type="submit" class="btn btn-info btn-block" id="submit" name="submit" value="Registration"> 
				<?php
				if(@$_GET['status']=="exist")
				{
					echo "<h4>UserName is Already Exist</h4>";
				}
				
				if(@$_GET['status']=="created")
				{
					echo "<h4>Successfully Created!</h4>";
				}
				?>
				<h4></h4>
			</form>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" style="background-color: #000!;"></div>
  </div>
</div>

</body>
</html>

<?php
if(@$_POST['submit'] && $_POST['submit']=="Registration")
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$mno=$_POST['mno'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$qry=$con->query("select * from login where uname='$uname' ");
	$no=$qry->rowCount();
	
	if($no<1)
	{
		echo "<h1>hello</h1>";
		$stm=$con->prepare("INSERT INTO `login`(`fname`, `lname`, `uname`, `pwd`, `emailid`, `mobileno`) VALUES (:fname,:lname,:uname,:pwd,:emailid,:mobileno)");
		$stm->bindParam(":fname",$fname);
		$stm->bindParam(":lname",$lname);
		$stm->bindParam(":uname",$uname);
		$stm->bindParam(":pwd",$pwd);
		$stm->bindParam(":emailid",$email);
		$stm->bindParam(":mobileno",$mno);
		$stm->execute();
		header('Location:registration.php?status=created');
	}else
	{
		header('Location:registration.php?status=exist');
	}
		


	
}

?>