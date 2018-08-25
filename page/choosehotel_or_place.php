<?php
	
include('HomeButton.php');
	require('../config/config.php');
	session_start();
	$id=$_SESSION['uid'];
	$planid=$_SESSION['planid'];
	$stmt=$con->query("select * from insertcity where planid='$planid'");
	foreach($stmt as $val)
	{
		$res=$val['cityname'];
	}
	$qry=$con->query("select * from city where city='$res'");
	foreach($qry as $val1)
	{
		$lat=$val1['lat'];
		$lang=$val1['lang'];
	}
		
	if(@$_POST['submit'] && $_POST['submit']=="Add Hotel")
	{
		$placename=$_POST['placename'];
		$lat=$_POST['lat'];
		$lang=$_POST['lang'];
		$stmt1 = $con->prepare("SELECT * FROM `HoldPlace` WHERE planid=$planid");
		$stmt1->execute();
		$no=$stmt1->rowCount();echo $no;
		if($no<1)
		{
			$stmt = $con->prepare("INSERT INTO holdplace(placename,lat,lang,planid) VALUES (:placename,:lat,:lang,:planid)");
			$stmt->bindParam(":placename",$placename);
			$stmt->bindParam(":lat",$lat);
			$stmt->bindParam(":lang",$lang);
			$stmt->bindParam(":planid",$planid);
			$stmt->execute();
					header('Location:choose_types.php');
		
		}
		else
		{
			header('Location:choose_types.php');
		}
	}

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

-
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
		var map;
		var infowindow;

		  function initMap() {
			var pyrmont = {
				lat: <?php echo $lat ?>,
				lng:  <?php echo $lang ?>
			};

			map = new google.maps.Map(document.getElementById('map'), {
			  center: pyrmont,
			  zoom: 20
			});

			infowindow = new google.maps.InfoWindow();
			var service = new google.maps.places.PlacesService(map);
			service.nearbySearch({
			  location: pyrmont,
			  radius: 50000,
			  type: ['lodging']
			}, callback);
		  }

		  function callback(results, status) {
			if (status === google.maps.places.PlacesServiceStatus.OK) {
				var hoteldata=JSON.stringify(results);
				
				for (var i = 0; i < results.length; i++) {
					
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("contain").innerHTML= document.getElementById("contain").innerHTML + this.responseText;
					}
					};
					xmlhttp.open("GET", "viewhotel.php?q=" + JSON.stringify(results[i]), true);
					xmlhttp.send();
				
				
				}
			}
		  }

		  function createMarker(place) {
			var placeLoc = place.geometry.location;
			var marker = new google.maps.Marker({
			  map: map,
			  position: place.geometry.location
			});

			google.maps.event.addListener(marker, 'click', function() {
			  infowindow.setContent(place.name);
			  infowindow.open(map, this);
			});
		  }
	  
	  
	</script>
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
			</div>
		</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXY5FJK1H2cMKVy9_ixtYScLo9OFuRCCo&libraries=places&callback=initMap" async defer></script>
 </body>
</html>


