<?php

include('HomeButton.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart City Travaller</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

	<script>
	function dateComp()
	{
		sdate=new Date(document.getElementById("sdate").value);
		edate=new Date(document.getElementById("edate").value);
		
		if(parseInt(sdate.getDate()) < parseInt(edate.getDate()) &&  parseInt(sdate.getYear()) <= parseInt(edate.getYear()))
		{
			return true;
		}
		else
		{
			alert("ToDate should not be lassthan From Date");
			return false;
			
		}
		
	}
	</script>
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
.ctrl{
width:100%;
height:40px;
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
margin-top:35%;
}
}

</style>
</head>

<body style="overflow-x-hidden;">

<div class="container-fluid" style="background:rgba(0,0,0,0.5);width:100%;height:100%;">
  <div class="wow zoomIn row">
    <div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="form">	
<!-- 		 -->
		<form name="date"  method="post" action="insertdate.php" >
				<h4><center>Choose Journy Date</h4>
				<label for="sdate">From Date</label>
				<br/>
				<input type="date" name="sdate" id="sdate" class="ctrl">
				<br/>
				<label for="sdate">To Date</label>
				<br/>
				<input type="date" name="edate" id="edate" class="ctrl">
				<br/>
				<br/>
				<input type="submit" onclick="return dateComp()" name="submit" id="submit" class="btn btn-info btn-block">
			</form>
		</div>
		  <div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>

	</div>
</div>
</body>
</html>
