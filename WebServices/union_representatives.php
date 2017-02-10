<?php

	$returnArray = array();
	
	$query = "SELECT * from `contact` where app_id = '$appID'";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$returnArray[] = $row;
	}
	
	echo json_encode($returnArray);
	
	
	

?>