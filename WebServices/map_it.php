<?php
	
	include 'headers/connect_to_mysql.php';
	$appID = $_GET['app_id'];
	
	$returnArray = array();
	$query = "SELECT `address` FROM `shopunion` WHERE `app_id` = '{$appID}'";
	$result = mysqli_query($con,$query) or die("error:");
	while($row = mysqli_fetch_assoc($result))
	{
		$address = $row['address'];
		$latlong    =   get_lat_long($address); // create a function with the name "get_lat_long" given as below
		$map        =   explode(',' ,$latlong);
		$mapLat     =   $map[0];
		$mapLong    =   $map[1];
		
		$mapLat = deg2rad($mapLat);
		$mapLong = deg2rad($mapLong);
		
		$tempArrayForGeoPoints = array();
		$tempArrayForGeoPoints['lat'] = $mapLat;// 0 index is latitude
		$tempArrayForGeoPoints['long'] = $mapLong;
		
		$returnArray[] = $tempArrayForGeoPoints;
	}
	
	echo json_encode($returnArray);
	
	
	
	
	
	
	
	

	function get_lat_long($address){
	
		$address = str_replace(" ", "+", $address);
	
		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
		$json = json_decode($json);
	
		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
		return $lat.','.$long;
	}
	
	/*
	
	
	shows shops within 1000 miles 
	
	$query = "SELECT *,acos(sin(0.43423933161) * sin(latitude) + cos(0.43423933161) * cos(latitude) * cos(`longitude` - (1.1699860019))) * 6371 as distance FROM shopunion WHERE acos(sin(0.43423933161) * sin(latitude) + cos(0.43423933161) * cos(latitude) * cos(`longitude` - (1.1699860019))) * 6371 <= 1000 order by distance";
	
	
	*/
	
?>