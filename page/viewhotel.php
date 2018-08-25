<?php
$q = $_REQUEST["q"];
$hoteljson=json_decode($q);
?>

<?php
	if(isset($hoteljson->name) and isset($hoteljson->rating) and isset($hoteljson->vicinity))
	{
?>
		<div class="wow slideInUp col-sm-12 col-xs-12" style="padding:20px;box-shadow:0px 0px 10px 0px;margin-top:10px;background:white;">
			<form method="post" action="choosehotel_or_place.php">
				<h4>
					<b><?php echo $hoteljson->name;?>
							<input type="text" name="placename" value="<?php echo $hoteljson->name;?>" style="display:none;">
							<input type="text" name="lat" value="<?php echo $hoteljson->geometry->location->lat;?>" style="display:none;">
							<input type="text" name="lang" value="<?php echo $hoteljson->geometry->location->lng;?>" style="display:none;">
							<button type="button" class="btn btn-default btn-sm" style="float:right;">
								<span class="glyphicon glyphicon-eye-open"></span> View Hotels Photos     
							</button>
					</b>
				</h4>
				
				<b>Rating:</b>
					<?php
						for($i=0;$i<5;$i++)
						{
							if($i<floor($hoteljson->rating))
							{
					?>
								<span class="fa fa-star checked"></span>
					<?php
							}
							else
							{
							
					?>
							<span class="fa fa-star "></span>
					<?php
							}
						}
					?>
					<br/>
				<b>Address:</b>
				<i><?php echo $hoteljson->vicinity;?></i>
				<br/><br/>
				<input type="submit" class="btn btn-info btn-block" name="submit"  id="submit" value="Add Hotel" style="background:#FF9900;font-size:20px;"/>
		</form>
	</div>
<?php
	}
?>