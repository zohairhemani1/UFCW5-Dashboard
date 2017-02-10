<?php
	
	include 'headers/connect_to_mysql.php';
	
	$returnArray = array();
	$query = "SELECT * from location where app_id = '$appID'";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$returnArray[] = $row;
	}
	
	echo json_encode($returnArray);

	
?>