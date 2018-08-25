
<?php
include('HomeButton.php');

require('../config/config.php');
session_start();

$id=$_SESSION['uid'];
$planname=$_SESSION['planname'];

$stmt=$con->query("select * from plan where planname='$planname'");
foreach($stmt as $val)
{
		$planid=$val['id'];
}
$stmt=$con->query("select * from holdplace where planid='$planid'");
foreach($stmt as $val)
{
		$lat=$val['lat'];
		$lang=$val['lang'];
}
$stmt=$con->query("delete from  plandetail where planid='$planid'");
	$stmt->execute();
$types=array();
if(isset($_POST['types']))
{
	$type=$_POST['types'];
	foreach($type as $val)
	{	
		$types[]=$val;
		
	}
}
else
{
	header('Location:choose_types.php');
}
// print_r($types);
// echo $lat;
// echo $lang;
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
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html,body{
		margin:0px;
		padding:0px;
		height:100%;
		w-idth:100%;
		background-attachment: fixed;
		background-size:100% 100%;
	}
	
    </style>
    <script>
		var map;
      var infowindow;
		var types = <?php echo json_encode($types); ?>;
		var place=[];
      function initMap() {
        var pyrmont = {lat: <?php echo $lat ?>, lng: <?php echo $lang ?>};
		
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 20
        });
	
		
		// infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
			for (var i = 0; i < types.length; i++) {
				var t=types[i];
				alert(t);
				service.nearbySearch({
					  location: pyrmont, 
					  radius: 1500,
					type:[t]
					}, callback);
			}
		}
		function callback(results, status) {
        	
		if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
			place.push(JSON.stringify(results[i]));
			//alert(JSON.stringify(results[i]));
			
          }

        }
      }
	  
		
      function createMarker(place) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });
		triangleCoords.push(place.geometry.location);
		
		
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("demo").innerHTML = this.responseText;
		}
		};
		xhttp.open("GET", "insertplan.php?planid=<?php echo $planid; ?> & placename=" + place.name, true);
		xhttp.send();
	
		
      }
	  var triangleCoords=new Array();
	 
	  function Make() {
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 5,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
      }
	  //ahi thi baki json daata fetch karava name

	  function abc()
	  {
		a=new Array();
		for (var i = 0; i < types.length; i++) {
			a[i]=new Array();
			for (var j = 0; j < place.length; j++) {
				var data=JSON.parse(place[j]);
				if(data.types.indexOf(types[i])==0)
				{
					a[i].push(JSON.stringify(data));
				}
			}
		}
		finalplace=new Array();
		
		for(i=0;i<a.length;i++)
		{
			r=Math.floor(Math.random()*10);
			finalplace.push(a[i][r]);
			finalplacejson=JSON.parse(a[i][r]);
			createMarker(finalplacejson);
		}
		
		Make()
	  
	}
	</script>

</head>
 <body onload="abc()">
    <div id="map" ></div>
		<div id="demo"></div>
		<div id="con"></div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXY5FJK1H2cMKVy9_ixtYScLo9OFuRCCo&libraries=places&callback=initMap" async defer></script>
 </body>
</html>


