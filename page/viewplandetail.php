<?php
include('HomeButton.php');
?>
<!DOCTYPE html>
<html>
  <head>
	<title>Smart City Travaller</title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.min.js"></script>
     <script>
		new WOW().init();
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

     </script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html,body{
		margin:0px;
		padding:0px;
		background-position:center;
		background:url('../image/bg.jpg');
		height:100%;
		w-idth:100%;
		background-attachment: fixed;
		background-size:100% 100%;
		background-position:fixed;
	}
	.hotels
	{
		border:1px solid;
		background:red;
		height:200px;
		width:200px;
	}
	.checked {
		color: #FF9900;	
	}

	//loading
	#preload{
		position: fixed;
		top: 0;  
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 8888
	}      
	#loader-wrapper {
		position: fixed;
		top: 0;  
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 1000;
		transform: rotate(15deg);
	}


	// Animations
	@keyframes spin {
		0%   {
			transform: rotate(0deg); 
		}
		100% {
			transform: rotate(360deg);
		}
	}



	.loading { 
		z-index: 1001;
		display: inline-block;
		position: fixed;
		left: 50%;
		top: 50%;
		width: 70px;
		height: 70px;
		margin-top: -35px;
		margin-left: -35px; 
		border-radius: 50%;
		border: 10px solid transparent;
		border-left: 10px solid #FF9900;
		border-bottom: 10px solid #FF9900;
		animation: spin-one 2s linear infinite;
		&:before, &:after {
			content: "";
			position: absolute;
			top: 0;
			left:0;
			display: block;
			width: 100%;
			height: 100%;
			border-radius: 50%;
			border: 10px solid transparent;
			border-left: 10px solid #FF9900;
			border-bottom: 10px solid #FF9900;
		}
		&:before  { animation: spin-two 1s linear infinite; }
		&:after { transform: scale(.6); }
	}

	@keyframes spin-one {
		0% { transform: rotateX(0) rotateY(0) rotateZ(0); }
		100% { transform: rotateX(0) rotateY(0) rotateZ(360deg); }
	} 

	@keyframes spin-two {
		0% { transform:rotateZ(0); }
		100% { transform:rotateZ(-360deg); }
	}
	 
	 #map {
        height: 100%;
      }
	  #preload
	  {
	  background:white;
	  position:fixed;
	  width:100%;
	  height:100%;
	  top:0;
	  left:0;
	  z-index:9999;
	  }


    </style>
    <script>
		$(window).ready(function(){
		  $("#preload").fadeOut(1000);
		  
		});

	</script>

</head>
 <body>
	<div id="preload">
		<div id="loader-wrapper">
			<div class="loading"></div> 
		</div>
	</div>
    <div id="map" style="display:none;"></div>
		<div class="container">
			<div class="row" id="contain" >
					<?php
						require('../config/config.php');
						session_start();
						$id=$_SESSION['uid'];
						$stmt = $con->query("select * from plan where uid=$id");
						$t=$stmt->fetchAll();
						foreach($t as $plan)
						{
					?>
							<div class="row"  style="margin-top:10px;,margin-bottom:10px;padding:40px;background:white;">
				
							<div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9" >
							<div id="delete"><a href="deleteplan.php?planid=<?php echo $plan['id']; ?>"><button style="background:#FF9900;color:white;border:0px;margin-left:100%;" >Delete</button></a></div>
							<h3><b>PlanName:<?php echo $plan['planname']; $pid=$plan['id']; ?></b><span></span></h3>
								<?php
									$stmt = $con->query("SELECT * FROM `journydate` where planid=$pid");
									$t=$stmt->fetchAll();
									foreach($t as $date)
									{
									?>
											<p><b>JournyDate: </b><span><?php
											echo $date['fromdate']." to ";
											echo $date['todate'];?></span></p>
									<?php
									}
									?>
									
					
					
									<?php
									$stmt = $con->query("SELECT * FROM `insertcity` where planid=$pid");
									$t=$stmt->fetchAll();
									foreach($t as $date)
									{
									?>
											<p><b>City : </b><span><?php
											echo $date['cityname'];?></span></p>
									<?php
									}
									?>
									
									<?php
									$stmt = $con->query("SELECT * FROM `holdplace` where planid=$pid");
									$t=$stmt->fetchAll();
									foreach($t as $date)
									{
									?>
											<p><b>HoldPlace : </b><span><?php
											echo $date['placename'];?></span></p>
									<?php
									}
									?>
									
									<?php
									$stmt = $con->query("SELECT * FROM `plandetail` where planid=$pid");
									$t=$stmt->fetchAll();
									?>
									<b>VisitedPlace : </b><span>
									<?php
									foreach($t as $date)
									{
									?>
									<?php
											echo $date['placename'].",";?></span>
									<?php
									}
									?>
										
								</div>
										
					</div>		
									<?php
									
									
								}

							?>		
							
				</div>
			</div>
		</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXY5FJK1H2cMKVy9_ixtYScLo9OFuRCCo&libraries=places&callback=initMap" async defer></script>
 </body>
</html>



