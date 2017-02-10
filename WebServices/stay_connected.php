<?php
	
	$query = "select * from stayconected WHERE app_id = '$appID'";
	$result = mysqli_query($con,$query);
	$returnArray = array();
	
	while($row = mysqli_fetch_assoc($result))
	{
		$returnArray[] = $row;
	}
	echo json_encode($returnArray);
	
?>