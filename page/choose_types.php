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
background:url('../image/bg.jpg');
height:100%;
width:100%;
background-repeat:no-repeat;
background-size:100% 100%;
background-position:center;

    background-attachment: fixed;

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


</script>
</head>
<body >

<div class="container-fluid">
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"  >
			
			<div class="table-responsive" style="background:white;padding:10px;">          
				<h4 >Choose State</h4>
				<form action="planmap.php" method="post" >
				<table class="table" >
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="amusement_park">Amusement_park</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="Aquarium">Aquarium</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="art_gallery">Art_gallery</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="bar">Bar</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="cafe">Cafe</td>
					</tr>
					
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="clothing_store">Clothing_store</td>
					</tr>
					
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="furniture_store">Furniture_store</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="gym">Gym</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="home_goods_store">Home_goods_store</td>
					</tr>
					
					
					
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="jewelry_store">Jewelry_store</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="Library">library</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="movie_theater">movie_theater</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="night_club">Night_club</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="shopping_mall">shopping_mall</td>
					</tr>
					
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="Supermarket">Supermarket</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="shopping_mall">shopping_mall</td>
					</tr>
					
					<tr>
						<td><input type="checkbox" name="types[]" id="types" value="zoo">zoo</td>
					</tr>
				
				</table>
				<br/>			<br/>			<br/>			<br/>
				</div>
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-0 col-xs-0" ></div>
			<div id="footer" style="position:fixed;top:90%;width:100%;">
		<input type="submit" class="btn btn-info btn-block" name="submit" id="submit" value="Submit"/>
	</form>
</div>

	</div>
				
</body>
</html>
