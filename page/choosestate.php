<?php
include('HomeButton.php');

?>
<!DOCTYPE html>
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

</head>
<style>
html,body{
margin:0px;
padding:0px;
background-position:center;
background:url('../image/bg.jpg');
height:100%;
width:100%;
background-size:100% 100%;
}
#form{
background:white;
border:1px solid #FF9900;
box-shadow:0px 0px 50px 0px #FF9900;
padding:10px;
margin-top:10%;
}
#submit
{
background:#FF9900;
color:white;
padding:10px;
}
td{
font-size:20px;
}

@media screen and (max-width: 900px) {
    
html,body{
background-size:cover;
}
#form{
margin-top:35%;
}
}

</style>
<script>

function abc(obj)
{
	var state=obj.value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "city.php?state="+state, true);
  xhttp.send();
	
}

</script>
</head>
<body >

<div class="container-fluid">
<div class= " row">
	<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"  >
			<h4 style="color:white;">Choose State</h4>
			<div class="table-responsive" style="background:white;padding:10px;">          
				<table class="table" >
					<tr>
						<td><input type="radio" name="state" id="state" value="GUJARAT" onchange="abc(this)">GUJARAT</td>
					</tr>
					<tr>
						<td><input type="radio" name="state" id="state" value="RAJASTHAN" onchange="abc(this)">RAJASTHAN</td>
					</tr>
					<tr>
						<td><input type="radio" name="state" id="state" value="DELHI" onchange="abc(this)">DELHI</td>
					</tr>
				</table>
				</div>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"  >
				<form method="post" action="insertcity.php">
					<div id="container" style="overflow-x:scroll">
					</div>
			</div>
		<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
	</div>
</div>	
<div id="footer" style="position:fixed;top:90%;width:100%;">
	<input type="submit" class="btn btn-info btn-block" name="submit" id="submit" value="Submit"/>
	</form>
</div>
				
				
</body>
</html>
